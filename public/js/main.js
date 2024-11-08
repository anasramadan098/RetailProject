// Toggle Active Class Fn

function toggleActiveClass(clickElement,toogleElement) {
    clickElement.addEventListener('click', () => {
        toogleElement.classList.toggle('active');
    })
}


// Expanded Menu
const expandedMenu = document.querySelector('.expanded');
document.querySelectorAll('.expandIcon').forEach(element => {
    element.addEventListener('click' , function () {
        
        const parentElement = element.parentElement.parentElement;
        
        document.querySelector('.cart').classList.add('active');
        document.querySelector('.expanded').classList.add('active');
        
    
        // Edit Product Elements In Expanded Div 
        
        // Img
        expandedMenu.querySelector('img').src = parentElement.querySelector('.main-img').src;
        
        // Info
        expandedMenu.querySelector('h3').textContent = parentElement.querySelector('.name a').textContent;
        expandedMenu.querySelectorAll('.stars i').forEach((star , index) => {
            if (index >= index) {
                star.classList.add('fa-star');
            }
        });

        // Options

        // Empty The Contianer
        const optionContienr = expandedMenu.querySelector('.options-container');
        optionContienr.innerHTML = '';

        let options = JSON.parse(parentElement.querySelector('.optionsExpanded').textContent);
        options.forEach(( option , i) => { 
            const div = document.createElement('div');
            if (i === 0) {
                div.className = 'option active';
                expandedMenu.querySelector('form.addToCart input.optionInput').value = option;
            } else {
                div.className = 'option';
            }
            div.innerHTML = option;

            div.addEventListener('click' , () => {
                div.parentElement.querySelectorAll('.option').forEach(opt => {
                    opt.classList.remove('active');
                });
                div.classList.add('active');
        
                expandedMenu.querySelector('form input.optionInput').value = option;
            })


            optionContienr.appendChild(div);

        })
                
        expandedMenu.querySelector('.rate a span').textContent = 5;
        expandedMenu.querySelector('.price').textContent = parentElement.querySelector('.prices p').textContent;
        expandedMenu.querySelector('.desc').textContent = parentElement.querySelector('.desc').textContent;
        expandedMenu.querySelector('.stock').textContent = parentElement.querySelector('.stock').textContent + ' In Stock';
        expandedMenu.querySelector('.sku span').textContent = parentElement.querySelector('.sku').textContent;
        expandedMenu.querySelector('form.addToCart input.product_id').value = parentElement.querySelector('.id').textContent;
    })
})

toggleActiveClass(document.querySelector('li.langs'), document.querySelector('li.langs'));

document.querySelector('.cartIcon').addEventListener('click', () => {
    document.querySelector('.cart').classList.add('active');
    document.querySelector('.shoppingCart').classList.add('active');
})

toggleActiveClass(document.querySelector('header li.user i'), document.querySelector('header .user-menu'));


// Close Icon
document.querySelectorAll('.close').forEach(e => 
    e.addEventListener('click', () => {
        document.querySelector('.cart').classList.remove('active');
        e.parentElement.classList.remove('active');
    })
)



// Imgs exChange View
const imgsContainersImgs = document.querySelectorAll('.imgs-container img');

imgsContainersImgs.forEach(img => {
    img.addEventListener('mouseenter', () => {
        const parent = img.parentElement.parentElement.querySelector('.main-img');
        parent.src = img.src;
    })
})


// Set Titles To Buttons
document.querySelectorAll('.btn').forEach(a => {
    const spanElement = a.querySelector('span');
    if (spanElement != null) {
        a.setAttribute('title', a.querySelector('span').textContent.toUpperCase()); 

    }
})

// Scrool To Top

document.querySelector('.scrollUp').addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
})

// Show The Button
window.addEventListener('scroll', () => {
    const scrollTop = window.pageYOffset;
    const scrollButton = document.querySelector('.scrollUp');

    if (scrollTop > 300) {
        scrollButton.classList.add('active')
    } else {
        scrollButton.classList.remove('active');
    }
})



// Featurate Tags
const tags = document.querySelectorAll('ul.tags li');
const productsTags = document.querySelectorAll('.featured .products .product');
tags.forEach(tag => {
    tag.addEventListener('click', () => {
        tags.forEach(t => t.classList.remove('active'));
        tag.classList.toggle('active');

        productsTags.forEach(product => {
            if (tag.textContent.toLowerCase() == 'all') {
                product.style.display = 'block';
            } else {
                if (tag.textContent.toLowerCase() === product.dataset.tag.toLowerCase()) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            }
        })
    })
})


// Toogle Whislist Icon
document.querySelectorAll('.product .whislist').forEach(icon => {
    icon.addEventListener('click', () => {
        icon.classList.toggle('active');
    })
})

if (document.querySelector('.AuthUserName') != null) {
    if (document.querySelector('.AuthUserName').textContent.length > 11) {
        document.querySelector('.AuthUserName').textContent = document.querySelector('.AuthUserName').textContent.slice(0,11) + '...' 
    }
}


let total_price_response = 0;
updatePrice();



function updatePrice() {
    document.querySelectorAll('.cart .item p .price').forEach(element => {
        const qty = element.parentElement.querySelector('.quantity').textContent;
        let splitedElement = element.textContent.split('$')[0];
        total_price_response += Number(splitedElement * qty);
        document.querySelector('.cart .total_price_response').textContent = parseFloat(total_price_response).toFixed(2);
    })
}



function createAlert(msg) {
    // Create Alert Message
    const response_msg = document.createElement('div');
    response_msg.className = 'alert';
    response_msg.textContent = msg;
    // Append
    document.querySelector('.alerts').appendChild(response_msg);
    setTimeout(() => {
        response_msg.classList.add('hide');
        setTimeout(() => {
            response_msg.remove();
        }, 2000);
    }, 3000);
}




// Active Class Option

document.querySelectorAll('.options-container .option').forEach(option => {
    option.addEventListener('click', () => {
        
        option.parentElement.querySelectorAll('.option').forEach(opt => {
            opt.classList.remove('active');

        });
        option.classList.add('active');
        
        option.parentElement.parentElement.querySelector('form.addToCart input.optionInput').value = option.textContent.trim();
        
    })
})