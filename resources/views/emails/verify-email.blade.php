    <!DOCTYPE html>
    <html>
      <head>
        <title>Email de Confirmação</title>
      </head>
      <body>
        <img src="https://tembarbada.com.br/img/logo-nav-2.png" style="height: 50px; width: auto;">
        <hr style="border-top: 0px solid black;">
        ...encurtar a distância entre as ofertas e os consumidores, esse é o objetivo 
        do Tem Barbada!
        <br/>
        É muito bacana você fazer parte dessa idéia, confirme seu cadastro e bons negócios.
        <br/>
        Confirme seu cadastro: <strong><a style="font-size: 14px;" href="{{url('/verificacao-email', $client['verify_register_token'])}}">Clique aqui</a></strong>
        <br/>
        Sucesso..
        <br/>
        <div style="height: 45px;">
          <span style="vertical-align:middle">Tem Barbada &copy; 2019 por Darby Biehl</span> <img src="https://tembarbada.com.br/img/user.jpg" style="height: 45px; width: auto; border-radius: 50%; vertical-align:middle; margin-left: 0.8rem;">        
        </div>
      </body>
    </html>