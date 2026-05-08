<div style="padding:20px;">
    <h2>Beérkezett üzenetek</h2>
    <table border="1" style="width:100%; border-collapse: collapse;">
        <tr style="background:#eee;">
            <th>Név (Státusz)</th>
            <th>Üzenet</th>
            <th>Időpont</th>
        </tr>
        <?php foreach ($messages as $m): ?>
        <tr>
            <td><?php echo htmlspecialchars($m['name']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($m['message'])); ?></td>
            <td><?php echo $m['created_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>