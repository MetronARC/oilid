<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Contact extends Controller
{
    public function generate()
    {
        // Initialize session
        $session = session();
        
        // Generate a random 6-character CAPTCHA (alternating between letters and numbers)
        $captcha = '';
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        
        for ($i = 0; $i < 6; $i++) {
            if ($i % 2 == 0) {
                $captcha .= $letters[rand(0, strlen($letters) - 1)];
            } else {
                $captcha .= $numbers[rand(0, strlen($numbers) - 1)];
            }
        }
        
        // Store CAPTCHA in session
        $session->set('captcha', $captcha);
        
        // Return JSON response
        return $this->response->setJSON([
            'status' => 'success',
            'captcha' => $captcha
        ]);
    }

    public function validateCaptcha()
    {
        // Get the submitted CAPTCHA
        $submittedCaptcha = $this->request->getPost('captcha');
        
        // Get the stored CAPTCHA from session
        $session = session();
        $storedCaptcha = $session->get('captcha');
        
        // Case-insensitive comparison
        $isValid = strcasecmp($submittedCaptcha, $storedCaptcha) === 0;
        
        // Generate new CAPTCHA for next attempt
        $session->remove('captcha');
        
        return $this->response->setJSON([
            'status' => $isValid ? 'success' : 'error',
            'valid' => $isValid
        ]);
    }

    public function sendEmail()
    {
        // Get form data
        $name = $this->request->getPost('name');
        $userEmail = $this->request->getPost('email');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');

        // Email configuration for cPanel
        $emailConfig = [
            'protocol' => 'smtp',
            'SMTPHost' => 'mail.oilid.com',
            'SMTPUser' => 'no-reply@oilid.com',
            'SMTPPass' => '2468g0a7A7B7*',
            'SMTPPort' => 465,
            'SMTPCrypto' => 'ssl',
            'mailType' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'validate' => true,
            'wordWrap' => true,
            'SMTPTimeout' => 30,
            'mailPath' => '/usr/sbin/sendmail' // Add cPanel sendmail path
        ];

        try {
            // Initialize email service
            $emailService = \Config\Services::email($emailConfig);

            // 1. Send notification email to admin
            $emailService->setFrom($userEmail, $name);
            $emailService->setTo('info@oilid.com');
            $emailService->setSubject('New Contact Form Submission: ' . $subject);
            
            // Build admin email message
            $adminEmailMessage = "
                <h2>New Contact Form Submission</h2>
                <p><strong>Name:</strong> {$name}</p>
                <p><strong>Email:</strong> {$userEmail}</p>
                <p><strong>Subject:</strong> {$subject}</p>
                <p><strong>Message:</strong></p>
                <p>{$message}</p>
            ";
            
            $emailService->setMessage($adminEmailMessage);

            // Try to send admin notification email
            $adminEmailSent = $emailService->send();
            
            // Get debug info
            $adminDebugInfo = $emailService->printDebugger(['headers', 'subject', 'body']);
            log_message('info', 'Admin email debug info: ' . print_r($adminDebugInfo, true));

            // Clear email object for auto-reply
            $emailService->clear();

            // 2. Send auto-reply email to user
            $emailService->setFrom('no-reply@oilid.com', 'OILid Support');
            $emailService->setReplyTo('no-reply@oilid.com', 'OILid Support');
            $emailService->setTo($userEmail);
            $emailService->setSubject('[No Reply] Email Successfully Received');
            
            // Build auto-reply message
            $autoReplyMessage = "
                <p>Hello {$name},</p>
                <p>Thank you for reaching out. This is an automated message to confirm that we have successfully received your email.</p>
                <p>We will get back to you as soon as possible.</p>
                <p>Best regards,<br>OILid Support Team</p>
            ";
            
            $emailService->setMessage($autoReplyMessage);

            // Try to send auto-reply email
            $autoReplySent = $emailService->send();
            
            // Get debug info for auto-reply
            $autoReplyDebugInfo = $emailService->printDebugger(['headers', 'subject', 'body']);
            log_message('info', 'Auto-reply email debug info: ' . print_r($autoReplyDebugInfo, true));

            // Check if both emails were sent successfully
            if ($adminEmailSent && $autoReplySent) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Thank you! Your message has been sent successfully.'
                ]);
            } else {
                // Log specific failures
                if (!$adminEmailSent) {
                    log_message('error', 'Admin notification email failed. Debug info: ' . print_r($adminDebugInfo, true));
                }
                if (!$autoReplySent) {
                    log_message('error', 'Auto-reply email failed. Debug info: ' . print_r($autoReplyDebugInfo, true));
                }
                
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Email sending failed. Please check the server logs for details.',
                    'debug' => ENVIRONMENT === 'development' ? [
                        'admin_debug' => $adminDebugInfo,
                        'autoreply_debug' => $autoReplyDebugInfo
                    ] : null
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Exception during email sending: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());
            
            return $this->response->setJSON([
                'status' => 'error',
                'message' => ENVIRONMENT === 'development' ? 
                    'Email error: ' . $e->getMessage() : 
                    'Sorry, there was an error sending your message. Please try again later.',
                'debug' => ENVIRONMENT === 'development' ? $e->getTraceAsString() : null
            ]);
        }
    }

    public function generateCaptcha()
    {
        // Generate random string
        $characters = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ'; // Removed confusing characters like 0,1,I,O
        $captchaString = '';
        for ($i = 0; $i < 6; $i++) {
            $captchaString .= $characters[random_int(0, strlen($characters) - 1)];
        }

        // Store in session
        session()->set('captcha', $captchaString);

        // Return the CAPTCHA with a success status
        return $this->response->setJSON([
            'status' => 'success',
            'captcha' => $captchaString
        ]);
    }
} 