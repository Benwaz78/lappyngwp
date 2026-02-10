document.addEventListener('DOMContentLoaded', function () {

    const MAX_COMPARE = 6;

    function getCompare() {
        return JSON.parse(localStorage.getItem('compare_products')) || [];
    }

    function saveCompare(list) {
        localStorage.setItem('compare_products', JSON.stringify(list));
    }

    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.compare-btn');
        if (!btn) return;

        e.preventDefault();

        let productId = btn.dataset.productId;
        let compare   = getCompare();

        if (compare.includes(productId)) {
            alert('Product already added to compare');
            return;
        }

        if (compare.length >= MAX_COMPARE) {
            alert('You can only compare up to ' + MAX_COMPARE + ' products');
            return;
        }

        compare.push(productId);
        saveCompare(compare);

        btn.textContent = 'Added';
        btn.classList.add('added');
    });

});

document.addEventListener('click', function (e) {

    const menuItem = e.target.closest('li.compare-go');
    if (!menuItem) return;

    e.preventDefault();

    let compare = JSON.parse(localStorage.getItem('compare_products')) || [];

    if (!compare.length) {
        alert('No products selected for comparison.');
        return;
    }

    window.location.href = '/compare-products/?ids=' + compare.join(',');
});
