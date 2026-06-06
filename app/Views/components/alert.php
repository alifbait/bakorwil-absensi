<?php if(session()->getFlashdata('success')) : ?>

<div class="mb-6 bg-green-100 border border-green-200 text-green-700 px-5 py-4 rounded-2xl font-medium">

    <?= session()->getFlashdata('success'); ?>

</div>

<?php endif; ?>

<?php if(session()->getFlashdata('error')) : ?>

<div class="mb-6 bg-red-100 border border-red-200 text-red-700 px-5 py-4 rounded-2xl font-medium">

    <?= session()->getFlashdata('error'); ?>

</div>

<?php endif; ?>