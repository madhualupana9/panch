<?php 
include 'includes/header.php'; 
require_once 'includes/db.php';

// Fetch active jobs from database
$stmt = $pdo->query("SELECT * FROM careers WHERE is_active = 1 ORDER BY `order` ASC, created_at DESC");
$jobs = $stmt->fetchAll();
?>

<!-- Custom Styles for Careers Page -->
<style>
    .page-banner {
        background-image: url('assests/image/banner2.jpg');
        background-size: cover;
        background-position: center;
        padding: 180px 0 120px;
        position: relative;
        text-align: center;
        color: #fff;
    }
    .page-banner::before {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }
    .page-banner .container { position: relative; z-index: 2; }
    .page-banner h1 { font-size: 3.5rem; font-weight: 700; margin: 0; color: aliceblue;}

    .section-padding { padding: 80px 0; }
    .bg-light-section { background-color: #fcfbf7; }

    .section-title { margin-bottom: 50px; font-weight: 700; color: #1a1a1a; position: relative; text-align: center; }
    .section-title::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: #c9a45c;
        margin: 15px auto 0;
    }

    .job-card {
        background: #fff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: 0.3s;
        height: 100%;
        border-left: 5px solid transparent;
    }
    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        border-left-color: #c9a45c;
    }
    .job-title { font-size: 1.4rem; font-weight: 700; color: #1a1a1a; margin-bottom: 15px; }
    .job-meta { display: flex; gap: 20px; color: #777; font-size: 0.9rem; margin-bottom: 20px; flex-wrap: wrap; }
    .job-meta span { display: flex; align-items: center; gap: 6px; }
    .job-desc { color: #666; line-height: 1.6; margin-bottom: 25px; }
    
    .btn-apply {
        display: inline-block;
        padding: 10px 25px;
        background: #c9a45c;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-apply:hover {
        background: #1a1a1a;
        color: #fff;
    }

    .benefit-box {
        text-align: center;
        padding: 40px 20px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        height: 100%;
        transition: 0.3s;
    }
    .benefit-box:hover { transform: translateY(-5px); }
    .benefit-icon {
        width: 70px;
        height: 70px;
        background: #fdf8ef;
        color: #c9a45c;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin: 0 auto 20px;
    }
    .benefit-box h4 { font-weight: 700; margin-bottom: 15px; }

    @media (max-width: 768px) {
        .page-banner { padding: 120px 0 80px; }
        .page-banner h1 { font-size: 2.5rem; }
    }
</style>

<div class="careers-page-wrapper">
    

    <!-- Why Join Us -->
    <section class="section-padding">
        <div class="container">
            <h2 class="section-title">Why Join Paanchajanya?</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-box">
                        <div class="benefit-icon"><i class="fas fa-rocket"></i></div>
                        <h4>Career Growth</h4>
                        <p>We believe in nurturing talent and providing ample opportunities for professional advancement.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-box">
                        <div class="benefit-icon"><i class="fas fa-heart"></i></div>
                        <h4>Great Culture</h4>
                        <p>Join a supportive, inclusive, and collaborative work environment where every voice is heard.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="benefit-box">
                        <div class="benefit-icon"><i class="fas fa-gem"></i></div>
                        <h4>Premium Benefits</h4>
                        <p>We offer competitive salaries, health benefits, and performance-based incentives.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Open Positions -->
    <section class="section-padding bg-light-section">
        <div class="container">
            <h2 class="section-title">Open Positions</h2>
            <div class="row g-4">
                <?php if (count($jobs) > 0): ?>
                    <?php foreach ($jobs as $job): ?>
                        <div class="col-lg-6">
                            <div class="job-card">
                                <h3 class="job-title"><?php echo htmlspecialchars($job['title']); ?></h3>
                                <div class="job-meta">
                                    <span><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($job['location']); ?></span>
                                    <span><i class="fas fa-briefcase"></i> <?php echo htmlspecialchars($job['type']); ?></span>
                                    <span><i class="fas fa-clock"></i> <?php echo htmlspecialchars($job['experience']); ?> Exp.</span>
                                </div>
                                <p class="job-desc"><?php echo htmlspecialchars($job['description']); ?></p>
                                <a href="javascript:void(0)" class="btn-apply btn-apply-now" 
                                   data-job-id="<?php echo $job['id']; ?>" 
                                   data-job-title="<?php echo htmlspecialchars($job['title']); ?>">Apply Now</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p>Currently, there are no open positions. Please check back later.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section-padding text-center">
        <div class="container">
            <h3>Don't see a role that fits?</h3>
            <p class="mb-4">Send us your resume anyway and we'll keep you in mind for future openings.</p>
            <a href="mailto:paanchajanyarealty@gmail.com" class="btn-apply" style="padding: 12px 35px; font-size: 1.1rem;">Email Your CV</a>
        </div>
    </section>
</div>

<!-- Job Application Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">Apply for <span id="modalJobTitle">Position</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="jobApplyForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="career_id" id="modalJobId">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number *</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Years of Experience</label>
                            <input type="number" name="years_of_experience" class="form-control" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Current Location</label>
                            <input type="text" name="current_location" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Notice Period</label>
                            <input type="text" name="notice_period" class="form-control" placeholder="e.g. 30 days">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Resume (PDF/DOC) *</label>
                            <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Cover Letter</label>
                            <textarea name="cover_letter" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div id="formAlert" class="mt-3" style="display: none;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn-apply border-0" id="submitBtn">Submit Application</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assests/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const applyModal = new bootstrap.Modal(document.getElementById('applyModal'));
    const applyButtons = document.querySelectorAll('.btn-apply-now');
    const jobApplyForm = document.getElementById('jobApplyForm');
    const formAlert = document.getElementById('formAlert');
    const submitBtn = document.getElementById('submitBtn');

    applyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const jobId = this.getAttribute('data-job-id');
            const jobTitle = this.getAttribute('data-job-title');
            
            document.getElementById('modalJobId').value = jobId;
            document.getElementById('modalJobTitle').textContent = jobTitle;
            
            // Reset form and alert
            jobApplyForm.reset();
            formAlert.style.display = 'none';
            formAlert.className = 'mt-3 alert';
            
            applyModal.show();
        });
    });

    jobApplyForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting...';
        
        const formData = new FormData(this);
        
        fetch('http://127.0.0.1:8000/api/job-applications', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                formAlert.textContent = data.message;
                formAlert.className = 'mt-3 alert alert-success';
                formAlert.style.display = 'block';
                jobApplyForm.reset();
                setTimeout(() => {
                    applyModal.hide();
                }, 3000);
            } else {
                let errorMsg = data.message || 'Something went wrong. Please try again.';
                if (data.errors) {
                    errorMsg += '<ul>';
                    Object.values(data.errors).forEach(errs => {
                        errs.forEach(err => {
                            errorMsg += `<li>${err}</li>`;
                        });
                    });
                    errorMsg += '</ul>';
                }
                formAlert.innerHTML = errorMsg;
                formAlert.className = 'mt-3 alert alert-danger';
                formAlert.style.display = 'block';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            formAlert.textContent = 'An error occurred while submitting the form. Please try again.';
            formAlert.className = 'mt-3 alert alert-danger';
            formAlert.style.display = 'block';
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Submit Application';
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>
