let likeButton = $('.likeFeature');
let chefIdentifier = $('#chefID').attr('data-chef');
likeButton.on('click', decisionMaking);


function decisionMaking(){
    if(likeButton.hasClass('far')){
        addLike();
    }else if(likeButton.hasClass('fas')){
        removeLike();
    }
}

function addLike(){
    likeButton.removeClass('far');
    likeButton.addClass('fas');
    $.ajax({
        beforeSend: (xhr) => {
            xhr.setRequestHeader('X-WP-Nonce', materialkData.nonce);
        },
        url: materialkData.root_url + '/wp-json/foodpalace/v1/likeFeature',
        type: "POST",
        data: { 'chefID' : chefIdentifier },
        success: (response) => {
            console.log(response);
        },
        error: (response) => {
            console.log(response);
        }
    });
}
function removeLike(){
    likeButton.removeClass('fas');
    likeButton.addClass('far');
    $.ajax({
        url: materialkData.root_url + '/wp-json/foodpalace/v1/likeFeature',
        type: "DELETE",
        success: (response) => {
            console.log(response);
        },
        error: (response) => {
            console.log(response);
        }
    });
}