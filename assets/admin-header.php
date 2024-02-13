<?php
    $roleForHeader = $_SESSION["role"]
?>
<header>
    <div class="logo">
        <a href="../admin/students.php">
            <img src="../img/hogwarts-logo.png" alt="logo">
        </a>
        
    </div>
    <nav>
        <ul>
            <li><a href="students.php">Seznam žáků</a></li>
            <li><a href="add-student.php">Přidat žáka</a></li>
            <?php if($roleForHeader === "admin"): ?>
                <li><a href="photos.php">Fotky</a></li>
            <?php endif; ?>
            <li><a href="log-out.php">Odhlásit</a></li>
        </ul>
    </nav>
    <div class="menu-icon">
        <i class="fa-solid fa-bars"></i>
    </div>
</header>