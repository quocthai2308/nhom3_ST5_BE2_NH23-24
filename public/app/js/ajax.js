window.onload = async function () {
    let like = document.querySelector('.like');
    let productId = like.getAttribute('data-product-id');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let stars = document.querySelectorAll('.radio');
    let reviewContent = document.querySelector('.reviewContent');
    let submit = document.querySelector('.submit');
    // send the review

    stars.forEach(element => {
        submit.addEventListener('click', () => {
            if (element.checked) {
                const rating = element.value;
                const content = reviewContent.value;
                sendReview(productId, csrfToken, rating, content);
            }
        })
    })
    // Get the current like status from the server when the page loads
    let isLiked = await getLikeStatus(productId, csrfToken);
    if (isLiked) {
        like.classList.remove('btn-primary');
        like.classList.add('btn-danger');
    } else {
        like.classList.remove('btn-danger');
        like.classList.add('btn-primary');
    }

    like.addEventListener('click', () => {
        toggleLike(productId, csrfToken, like);
    });
}

async function getLikeStatus(productId, csrfToken) {
    const url = '/get-like-status';
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ product_id: productId })
    });

    if (response.ok) {
        const result = await response.json();
        return result.isLiked;
    } else {
        alert("Error: " + response.status);
    }
}

async function toggleLike(productId, csrfToken, like) {
    const url = '/like';
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ product_id: productId })
    });

    if (response.ok) {
        const result = await response.json();
        if (result.success) {
            if (like.classList.contains('btn-primary')) {
                like.classList.remove('btn-primary');
                like.classList.add('btn-danger');
            } else {
                like.classList.remove('btn-danger');
                like.classList.add('btn-primary');
            }
        } else {
            alert("Failed to toggle like");
        }
    } else {
        alert("login ");
    }
}
// reviews
async function sendReview(productId, csrfToken, rating, content) {
    const url = '/review';
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            product_id: productId,
            content: content,
            rating: rating
        })
    });
    if (response.ok) {
        const result = await response.json();
        if (result.success) {

        } else {
            alert("Bạn đã đánh giá rồi!!!");
        }
    } else {
        alert("Vui lòng chọn đánh giá và nhập nội dung");
    }
}