<div class="heading-inner">
   	<a class="btn btn-primary" href="<?= base_url('members/dashboard') ?>">Dashboard</a>
   	<a class="btn btn-primary" href="<?= base_url('members/Profile_list') ?>">Profile List</a>
   	<a class="btn btn-primary" href="<?= base_url('members/new_profile') ?>">Add New Profile</a>
</div>
<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success">
        <strong>Success!</strong> <?= $this->session->flashdata('success') ?>.
    </div>
<?php endif ; ?>