// Update the coins for the child
async function updateCoins(child, action) {
    try {
        const response = await fetch('admin.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: action,
                child: child
            })
        });

        const result = await response.json();
        if (result.success) {
            // Update the UI
            const grid = document.getElementById(`${child}-grid`);
            grid.innerHTML = '';
            for (let i = 0; i < result.coins; i++) {
                const coin = document.createElement('div');
                coin.className = 'coin';
                grid.appendChild(coin);
            }
        }
    } catch (error) {
        console.error('Error:', error);
    }
}