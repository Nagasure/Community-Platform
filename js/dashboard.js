document.addEventListener('DOMContentLoaded', function() {
    // Sample updates data - In a real application, this would come from an API or database
    const updates = [
        { date: '2024-01-12', message: 'New feature: Member search implemented' },
        { date: '2024-01-11', message: 'Community guidelines updated' },
        { date: '2003-01-10', message: 'Welcome to our newest members!' }
    ];

    const updatesTable = document.getElementById('updates');
    
    updates.forEach(update => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${new Date(update.date).toLocaleDateString()}</td>
            <td>${update.message}</td>
        `;
        updatesTable.appendChild(row);
    });
});