<?= $this->extend('Frontend\Templates\Content') ?>

<?= $this->section('content') ?>

<div class="container section">

    <div class="section-title">
        <h2>Contact Us</h2>
        <p>We'd love to hear from you.</p>
    </div>

    <div class="grid grid-2" style="max-width: 1000px; margin: 0 auto; gap: 80px;">

        <!-- Contact Info -->
        <div>
            <h4 style="margin-bottom: 24px;">Our Office</h4>
            <p class="mb-4">
                123 Fashion Street<br>
                New York, NY 10001<br>
                United States
            </p>

            <p class="mb-1"><strong>Email:</strong> help@outfitr.com</p>
            <p><strong>Phone:</strong> +1 (555) 123-4567</p>

            <div style="margin-top: 40px;">
                <h4 style="margin-bottom: 24px;">Hours</h4>
                <p>Monday - Friday: 9am - 6pm</p>
                <p>Saturday: 10am - 4pm</p>
            </div>
        </div>

        <!-- Form -->
        <div>
            <form>
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Your Email">
                </div>
                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" rows="5" placeholder="How can we help?"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>

    </div>
</div>

<?= $this->endSection() ?>