<form action="index.php?action=register" method="post" enctype="multipart/form-data">
    <input type="email" name="email" required placeholder="Email">
    <input type="text" name="name" required placeholder="Name">
    <input type="password" name="password" required placeholder="Password">
    <input type="text" name="tel" required placeholder="Telephone">
    <select name="role" id="role" required onchange="toggleLogo(this)">
        <option value="passenger">Passenger</option>
        <option value="company">Company</option>
    </select>
    <div id="logoField" style="display: none;">
        <input type="file" name="logo" accept="image/*">
    </div>
    <button type="submit">Register</button>
</form>

<script>
    function toggleLogo(select) {
        var logoField = document.getElementById('logoField');
        if (select.value === 'company') {
            logoField.style.display = 'block';
        } else {
            logoField.style.display = 'none';
        }
    }
</script>
