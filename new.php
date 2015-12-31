<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
<script>
    var encrypted = CryptoJS.AES.encrypt("Message", "Secret Passphrase");

    var decrypted = CryptoJS.AES.decrypt(encrypted, "Secret Passphrase");
</script>