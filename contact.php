<div style="padding:20px;">
    <h2>Kapcsolat</h2>
    <form id="contactForm" method="POST">
        <p>Név:<br><input type="text" name="name" id="name"></p>
        <p>Üzenet:<br><textarea name="message" id="message" rows="5" style="width:100%"></textarea></p>
        <button type="submit">Küldés</button>
    </form>
</div>

<script>
document.getElementById('contactForm').onsubmit = function(e) {
    var name = document.getElementById('name').value.trim();
    var msg = document.getElementById('message').value.trim();
    if (name === "" || msg === "") {
        alert("JavaScript hiba: Kérem töltse ki a mezőket!");
        e.preventDefault();
        return false;
    }
};
</script>
