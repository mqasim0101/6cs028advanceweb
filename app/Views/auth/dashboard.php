<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <h1>Welcome to Dashboard</h1>
        <p class="lead">Hello, <?= esc(session()->get('username')) ?>! You are now logged in.</p>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Latest News</h5>
                <p class="card-text">View and manage latest news articles.</p>
                <a href="#" class="btn btn-primary">View Articles</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Your Profile</h5>
                <p class="card-text">Update your account information.</p>
                <a href="<?= base_url('auth/dashboard') ?>" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Settings</h5>
                <p class="card-text">Manage your account settings.</p>
                <a href="<?= base_url('auth/settings') ?>" class="btn btn-primary">Settings</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>