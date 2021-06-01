let line = '';
$('.installments').on('click', function (e) {

    let idprops = $(this).data('idprops')
    
    $('#inst').modal('show')

    let el = $('#paydate')
        
    el.html('')
    
    $.get('/propostas/'+idprops+'/datas-de-pagamento', (data) => {
        let dt = JSON.parse(data)
        let pays = JSON.parse(dt.installments_date)

        $.each(pays, (k, v) => {
            let date = new Date(v)

            let day = date.getDate()
            let mth = date.getMonth() +1
            let year = date.getFullYear()

            el.append(`
                <p>${day+" / "+mth+" / "+year}</p>
            `)
        })
    })

})

$('td select').on('change', function () {
    let stts = $(this).val();
    let idprops = $(this).data('id')

    let conf = confirm("Deseja realmente mudar o status?")

    if(conf) {
        $.get('/set-status', {stts, idprops}, (data) => {
            if (data) {
                alert('Status alterado com sucesso!')
            } else {
                alert('Não foi possível alterar o status')
            }
        })
    }
})

$('.line').on('click', function () {
    line = $(this).data('line')

    $('.line').removeClass('selected')
    $(this).addClass('selected')

    $('.editp').removeClass('disabled').attr('href', '/proposta/'+line+'/editar')
})

$('.client-line').on('click', function () {
    line = $(this).data('line')

    $('.client-line').removeClass('selected')
    $(this).addClass('selected')

    $('.editc').removeClass('disabled').attr('href', '/cliente/'+line+'/editar')
    $('.propsc').removeClass('disabled').attr('href', '/cliente/'+line+'/propostas')
})