<div style="padding:20px; font-family:sans-serif;">
    <h2>Utazási ajánlatok kezelése</h2>

    <?php if(isset($_GET['error']) && $_GET['error'] == 'invalid_hotel'): ?>
        <div style="background:#f8d7da; color:#721c24; padding:10px; margin-bottom:10px; border-radius:5px;">
            <strong>Hiba:</strong> A megadott szálloda kód nem létezik! Kérjük, használjon létező kódot (pl. BS, MP, TA).
        </div>
    <?php endif; ?>

    <div style="background:#f4f4f4; padding:20px; margin-bottom:30px; border: 1px solid #bd8632; border-radius:8px;">
        <h3><?= isset($editData) && $editData ? "Módosítás" : "Új ajánlat" ?></h3>
        <form method="POST">
            <?php if(isset($editData) && $editData): ?> 
                <input type="hidden" name="id" value="<?= $editData['id'] ?>"> 
            <?php endif; ?>
            <input name="szalloda_az" value="<?= $editData['szalloda_az'] ?? '' ?>" placeholder="Szálloda kód (pl. BS)" required style="padding:8px;">
            <input name="indulas" value="<?= $editData['indulas'] ?? '' ?>" placeholder="Indulás (éééé.hh.nn)" required style="padding:8px;">
            <input name="idotartam" type="number" value="<?= $editData['idotartam'] ?? '' ?>" placeholder="Napok" required style="padding:8px; width:80px;">
            <input name="ar" type="number" value="<?= $editData['ar'] ?? '' ?>" placeholder="Ár" required style="padding:8px;">
            <button type="submit" name="<?= isset($editData) && $editData ? 'update_travel' : 'add_new' ?>" style="background:#28a745; color:white; padding:10px; border:none; cursor:pointer;">Mentés</button>
            <?php if(isset($editData) && $editData): ?> <a href="index.php?page=travel">Mégse</a> <?php endif; ?>
        </form>
    </div>

    
    <table border="1" cellpadding="10" style="width:100%; border-collapse:collapse;">
        <tr style="background: #cf8216;3; color:whte;">
            <th>Szálloda</th><th>Indulás</th><th>Nap</th><th>Ár</th><th>Műveletek</th>
        </tr>
        <?php foreach ($trips as $t): ?>
        <tr>
            <td><strong><?= htmlspecialchars($t['szalloda_nev'] ?? $t['szalloda_az']) ?></strong></td>
            <td><?= htmlspecialchars($t['indulas']) ?></td>
            <td><?= htmlspecialchars($t['idotartam']) ?> nap</td>
            <td><?= number_format($t['ar'], 0, ',', ' ') ?> Ft</td>
            <td>
                <a href="index.php?page=travel&action=edit&id=<?= $t['id'] ?>">Szerkesztés</a> |
                <a href="index.php?page=travel&action=delete&id=<?= $t['id'] ?>" onclick="return confirm('Törlés?')">Törlés</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>