<h2 style="margin-bottom: 25px; text-align: center;">Feltöltött képek galériája</h2>

<div style="background: #fdfdfd; padding: 25px; border-radius: 15px; margin-bottom: 35px; border: 1px solid #eee; text-align: center;">
    <?php if (isset($_SESSION['user'])): ?>
        <form action="index.php?page=images" method="post" enctype="multipart/form-data">
            <p style="margin-bottom: 15px; color: #555;">Szia <strong><?php echo $_SESSION['user']['name']; ?></strong>! Tölts fel egy új emléket:</p>
            <input type="file" name="image" required style="margin-bottom: 15px;">
            <br>
            <button type="submit" class="btn">Kép feltöltése</button>
        </form>
    <?php else: ?>
        <div style="padding: 20px; border: 2px dashed #e67e22; border-radius: 12px; background: #fffaf5;">
            <p style="color: #d35400; font-weight: bold; font-size: 1.1rem;">
                Csak bejelentkezés / regisztráció után tudsz képet feltölteni!
            </p>
            <p style="margin-top: 15px;">
                <a href="index.php?page=login" class="btn" style="text-decoration: none; display: inline-block;">
                    Belépés a fiókba
                </a>
            </p>
        </div>
    <?php endif; ?>
</div>

<div class="gallery" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 25px;">
    <?php if (!empty($images)): ?>
        <?php foreach ($images as $img): ?>
            <div class="gallery-item" style="background: white; padding: 12px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                <img src="./uploads/<?php echo $img['filename']; ?>" 
                     style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;" 
                     alt="Kép">
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="grid-column: 1 / -1; text-align: center; color: #999;">Még nincsenek feltöltött képek a galériában.</p>
    <?php endif; ?>
</div>