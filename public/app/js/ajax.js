let like = document.querySelector('#like');
document.querySelector('meta[name="csrf-token"]')
like.addEventListener('click', () => {
    addLike(like.getAttribute('data-product-id'));
});
async function addLike(productId) {
    const url = '/like';
    const response = await fetch(url, { 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ product_id: productId })
    });

    if (response.ok) {
        const result = await response.json();
        if (result.success) {
            alert("Liked");
        } else {
            alert("Failed to like");
        }
    } else {
        alert("Error: " + response.status);
    }
}
