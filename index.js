const { exec } = require('child_process');

// Array yang berisi 4 perintah yang akan dijalankan secara paralel
const commands = [
    'php attack.php',
    'php attack.php',
    'php attack.php',
    'php attack.php',
	'php attack.php',
'php attack.php',
	'php attack.php',
	'php attack.php'
   // Ganti dengan perintah yang Anda inginkan
];

// Membuat array janji untuk setiap perintah
const promises = commands.map(command => {
    return new Promise((resolve, reject) => {
        exec(command, (error, stdout, stderr) => {
            if (error) {
                reject(`Error executing command: ${command}`);
            } else {
                resolve(stdout);
            }
        });
    });
});

// Menjalankan semua perintah secara paralel
Promise.all(promises)
    .then(results => {
        console.log('All commands executed successfully:');
        results.forEach(result => {
            console.log(result);
        });
    })
    .catch(error => {
        console.error('At least one command failed:');
        console.error(error);
    });

