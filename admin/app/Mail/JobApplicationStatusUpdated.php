<?php

namespace App\Mail;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplicationStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $applicantName;
    public $position;
    public $status;
    public $statusLabel;
    public $statusColor;
    public $statusMessage;

    /**
     * Create a new message instance.
     */
    public function __construct(JobApplication $jobApplication, $oldStatus, $newStatus)
    {
        $this->applicantName = $jobApplication->full_name;
        $this->position = $jobApplication->position_applied;
        $this->status = $newStatus;
        $this->statusLabel = $this->getStatusLabel($newStatus);
        $this->statusColor = $this->getStatusColor($newStatus);
        $this->statusMessage = $this->getMessageByStatus($newStatus);
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject($this->getSubjectByStatus($this->status))
                    ->view('emails.job-application-status-updated');
    }

    /**
     * Get subject line based on status
     */
    private function getSubjectByStatus($status)
    {
        return match($status) {
            'reviewing' => 'Your Application is Under Review - Paanchajanya Reality',
            'shortlisted' => 'Congratulations! You\'ve Been Shortlisted - Paanchajanya Reality',
            'rejected' => 'Update on Your Application - Paanchajanya Reality',
            'hired' => 'Congratulations! Welcome to Paanchajanya Reality',
            default => 'Application Status Update - Paanchajanya Reality',
        };
    }

    /**
     * Get status label for display
     */
    private function getStatusLabel($status)
    {
        return match($status) {
            'pending' => 'Pending Review',
            'reviewing' => 'Under Review',
            'shortlisted' => 'Shortlisted',
            'rejected' => 'Not Selected',
            'hired' => 'Hired',
            default => ucfirst($status),
        };
    }

    /**
     * Get status color for email styling
     */
    private function getStatusColor($status)
    {
        return match($status) {
            'pending' => '#FFA500',
            'reviewing' => '#3B82F6',
            'shortlisted' => '#10B981',
            'rejected' => '#EF4444',
            'hired' => '#8B5CF6',
            default => '#6B7280',
        };
    }

    /**
     * Get personalized message based on status
     */
    private function getMessageByStatus($status)
    {
        return match($status) {
            'reviewing' => 'Thank you for your application. We are currently reviewing your profile and will get back to you soon with the next steps.',
            'shortlisted' => 'We are impressed with your qualifications! You have been shortlisted for the next round. Our HR team will contact you shortly to schedule an interview.',
            'rejected' => 'Thank you for your interest in joining Paanchajanya Reality. After careful consideration, we have decided to move forward with other candidates whose qualifications more closely match our current needs. We encourage you to apply for future opportunities that match your skills.',
            'hired' => 'We are thrilled to offer you the position! Welcome to the Paanchajanya Reality team. Our HR department will reach out to you with the offer letter and onboarding details.',
            default => 'Your application status has been updated. We will keep you informed of any further developments.',
        };
    }
}

