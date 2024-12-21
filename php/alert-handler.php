<?php
if (isset($_GET['action']) && isset($_GET['status']) && isset($_GET['type'])) 
{
    $action = htmlspecialchars($_GET['action']); 
    $status = htmlspecialchars($_GET['status']);
    $type = htmlspecialchars($_GET['type']); 

    echo "<div class='alert alert-$type alert-dismissible fade show' role='alert'
            style='position:absolute;top:108px;right:30px;width:fit-content;'>
            <strong>$status</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
        </div>";

    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewSection = document.getElementById('view-users');
            const addSection = document.getElementById('add-user');
            const updateSection = document.getElementById('update-user');
            const deleteSection = document.getElementById('delete-user');
            const setPasswordSection = document.getElementById('set-password');

            viewSection.classList.remove('active');
            addSection.classList.remove('active');
            updateSection.classList.remove('active');
            deleteSection.classList.remove('active');
            setPasswordSection.classList.remove('active');

            if ('$action' === 'add') {
                addSection.classList.add('active');
            } else if ('$action' === 'update') {
                updateSection.classList.add('active');
            } else if ('$action' === 'delete') {
                deleteSection.classList.add('active');
            } else if ('$action' === 'set-password') {
                setPasswordSection.classList.add('active');
            }
        });
    </script>";
}
?>
