$(document).on('click','#like',function (e){
    console.log(e.target)
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })
    $.ajax({
        type: "POST",
        url: '/comment/reaction/like',
        data : JSON.stringify({
            comment_id : e.target.closest('li').getAttribute('comment-id') ,
            _method : 'POST'
        }),

        success: function(data)
        {
            e.target.nextElementSibling.innerHTML = data.like;

            if (data.action  == 'like'){
                e.target.classList.add('fa-thumbs-up');
                e.target.classList.remove('fa-thumbs-o-up');
            }
            else if(data.action == 'none'){
                e.target.classList.add('fa-thumbs-o-up');
                e.target.classList.remove('fa-thumbs-up');
            }
            else {
                e.target.classList.remove('fa-thumbs-o-up');
                e.target.classList.add('fa-thumbs-up');
                e.target.nextElementSibling.nextElementSibling.classList.add('fa-thumbs-o-down');
                e.target.nextElementSibling.nextElementSibling.classList.remove('fa-thumbs-down');
                e.target.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML = data.dislike
            }
        }
    });
});
$(document).on('click','#dislike',function (e){
    e.preventDefault();
    console.log(e.target.parentElement.firstElementChild.classList)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type' : 'application/json'
        }
    })
    $.ajax({
        type: "POST",
        url: '/comment/reaction/dislike',
        data : JSON.stringify({
            comment_id : e.target.closest('li').getAttribute('comment-id') ,
            _method : 'POST'
        }),

        success: function(data)
        {
            e.target.nextElementSibling.innerHTML = data.dislike;
            if (data.action  == 'dislike'){
                e.target.classList.add('fa-thumbs-down');
                e.target.classList.remove('fa-thumbs-o-down');
            }
            else if(data.action == 'none'){
                e.target.classList.add('fa-thumbs-o-down');
                e.target.classList.remove('fa-thumbs-down');
            }
            else {
                e.target.parentElement.firstElementChild.classList.remove('fa-thumbs-up')
                e.target.parentElement.firstElementChild.classList.add('fa-thumbs-o-up')
                e.target.classList.add('fa-thumbs-down');
                e.target.classList.remove('fa-thumbs-o-down');
                e.target.parentElement.firstElementChild.nextElementSibling.innerHTML = data.like
            }
        }
    });
});
