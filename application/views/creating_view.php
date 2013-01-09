<html>
<head>
<body>
<?php $this->load->helper('form'); ?>
 
 <h1>CodeIgniter CRUD Tutorial Example</h1>
 
<?php echo form_open('creating/update/'.$emp_no); ?>
 
    <p>
        <?php echo form_input('emp_no'); ?>
    </p>
 
    <p>
        <?php echo form_input('first_name'); ?>
    </p>
 
    <p>
        <?php echo form_submit('submit', 'Submit'); ?>
    </p>
 
<?php echo form_close(); ?>
</body>
</head>
</html>