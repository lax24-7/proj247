<!-- footer.php -->

<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .content {
        flex: 1;
    }

    .footer {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
        font-size: 14px;
        margin-top: auto;
        padding-bottom:10px;
    }
</style>

<div class="content">
    <!-- Your page content goes here -->
</div>

<footer class="footer">
    &copy; <?php echo date('Y'); ?> Attendance Management System. All rights reserved.
</footer>
