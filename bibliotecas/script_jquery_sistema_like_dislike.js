$(document).ready(function(){

    // se o usuário clicar no botão curtir ...
    $('.like-btn').on('click', function(){
        var cod_obra = $(this).data('cod_obra');
        $clicked_btn = $(this);

        // para o botão curtir, você só pode curtir ou não curtir, nenhuma ação antipatia.
        if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
            action = 'like';
        } else if($clicked_btn.hasClass('fa-thumbs-up')){
            action = 'unlike';
        }

        $.ajax({
            url: 'pagina_home.php',
            type: 'post',
            data: {
                'action': action,
                'cod_obra': cod_obra
            },
            success: function(data){
                res = JSON.parse(data);
                if (action == "like") {
                    $clicked_btn.removeClass('fa-thumbs-o-up');
                    $clicked_btn.addClass('fa-thumbs-up');
                } else if(action == "unlike") {
                    $clicked_btn.removeClass('fa-thumbs-up');
                    $clicked_btn.addClass('fa-thumbs-o-up');
                }
                // exibe o número de gostos e não gostos
                $clicked_btn.siblings('span.likes').text(res.likes);
                $clicked_btn.siblings('span.dislikes').text(res.dislikes);
        
                // mude o estilo do botão do outro botão se o usuário estiver reagindo pela segunda vez para postar
                $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
            }
        });		
    
    });
    
    // se o usuário clicar no botão não gostar ...
    $('.dislike-btn').on('click', function(){
        var cod_obra = $(this).data('cod_obra');
        $clicked_btn = $(this);

        if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
            action = 'dislike';
        } else if($clicked_btn.hasClass('fa-thumbs-down')){
            action = 'undislike';
        }

        $.ajax({
            url: 'pagina_home.php',
            type: 'post',
            data: {
                'action': action,
                'cod_obra': cod_obra
            },
            success: function(data){
                res = JSON.parse(data);
                if (action == "dislike") {
                    $clicked_btn.removeClass('fa-thumbs-o-down');
                    $clicked_btn.addClass('fa-thumbs-down');
                } else if(action == "undislike") {
                    $clicked_btn.removeClass('fa-thumbs-down');
                    $clicked_btn.addClass('fa-thumbs-o-down');
                }
                // exibe o número de gostos e não gostos
                $clicked_btn.siblings('span.likes').text(res.likes);
                $clicked_btn.siblings('span.dislikes').text(res.dislikes);
                
                // mude o estilo do botão do outro botão se o usuário estiver reagindo pela segunda vez para postar
                $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
            }
        });	
    
    });
    
});