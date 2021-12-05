@extends('emails.layout')

@section('content')
<span class="preheader">
  Email Preview
</span>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
  <tr>
    <td>&nbsp;</td>
    <td class="container">
      <div class="content">
        
        <!-- START CENTERED WHITE CONTAINER -->
        <table role="presentation" class="main">
          
          <!-- START MAIN CONTENT AREA -->
          <tr>
            <td class="wrapper">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <p>Dear user, </p>
                    <p>A new book with the name <strong>{{$data['bookTitle']}}</strong> has beed added. Check the contents of the book here: <a href="{{$data['editRoute']}}">LINK</a>
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          
          <!-- END MAIN CONTENT AREA -->
        </table>
        <!-- END CENTERED WHITE CONTAINER -->
        
        <!-- START FOOTER -->
        <div class="footer">
          <table role="presentation" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="content-block">
                <span class="apple-link">COMPANY NAME</span>
                <br> Don't like these emails? <a href="http://i.imgur.com/CScmqnj.gif">Unsubscribe</a>.
              </td>
            </tr>
            <tr>
              <td class="content-block powered-by">
                Powered by <a href="http://htmlemail.io">PWA2 Library</a>.
              </td>
            </tr>
          </table>
        </div>
        <!-- END FOOTER -->
        
      </div>
    </td>
    <td>&nbsp;</td>
  </tr>
</table>
@endsection