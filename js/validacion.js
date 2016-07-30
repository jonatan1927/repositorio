 var v=true;
        $("span.help-block").hide();

        function verificar(){

            var v1=0,v2=0,v3=0,v4=0,v5=0,v6=0;
            v1=validacion('codigo');
            v2=validacion('nombres');
            v3=validacion('dni');
            v4=validacion('email');
            v5=validacion('genderRadios');
            v6=validacion('carrera');
            if (v1===false || v2===false || v3===false || v4===false || v5===false || v6===false ) {
                 $("#exito").hide();
                 $("#error").show();
            }else{
                $("#error").hide();
                $("#exito").show();
            }
            /*total=v1+v2+v3+v4+v5+v6;
            if (v && total>=6) {
                $("#error").hide();
                $("#exito").show();
            }else{
                 $("#exito").hide();
                 $("#error").show();
            }
            
            
            validacion('nombres');
            validacion('dni');
            validacion('email');
            validacion('genderRadios');
            validacion('carrera');
            if (v) {
                alert("los campos estan validados")
            }
            else{
                alert("los campos no estan validados");
            }*/

        } 
        
        function validacion(campo){
            var a=0;
                        if (campo==='tema'){
                indice = document.getElementById(campo).selectedIndex;
                if( indice == null ) {
                    $('#tema').parent().parent().attr("class", "form-group has-error");
                    return false;
                }
                else{
                    $('#tema').parent().parent().attr("class", "form-group has-success");
                    return true;

                }
            }
                        if (campo==='categoria'){
                indice = document.getElementById(campo).selectedIndex;
                if( indice == null  ) {
                    $('#categoria').parent().parent().attr("class", "form-group has-error");
                    return false;
                }
                else{
                    $('#categoria').parent().parent().attr("class", "form-group has-success");
                    return true;

                }
            }
                        if (campo==='comentario'){
                apellido = document.getElementById(campo).value;
                if( apellido === null || apellido.length === 0 || /^\s+$/.test(apellido) || apellido.length >= 1001) {
                    
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#'+campo).parent().children('span').text("Ingrese algo").show();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                    return false;
                    
                }
                else{
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
                    $('#'+campo).parent().children('span').hide();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                    return true;
                    
                } 
            }
            
            if (campo==='codigo')
            {
                codigo = document.getElementById(campo).value;
                if( codigo == null || codigo.length == 0 || /^\s+$/.test(codigo) ) {
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#'+campo).parent().children('span').text("Ingrese algo").show();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                    return false;
                   
                }
                else
                {
                    if(isNaN(codigo)) {

                        $("#glypcn"+campo).remove();
                        $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                        $('#'+campo).parent().children('span').text("No Acepta letras").show();
                        $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");

              
                        return false;
                    }
                    else{

                        $("#glypcn"+campo).remove();
                        $('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
                        $('#'+campo).parent().children('span').hide();
                        $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
             
                        return true;
                    }
                    
                    
                }
                
            }
                if (campo==='cod')
            {
                codigo = document.getElementById(campo).value;
                if( codigo == null || codigo.length == 0 || /^\s+$/.test(codigo) ) {
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#'+campo).parent().children('span').text("Ingrese algo").show();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                    return false;
                   
                }
                else
                {
                    if(isNaN(codigo)) {

                        $("#glypcn"+campo).remove();
                        $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                        $('#'+campo).parent().children('span').text("No Acepta letras").show();
                        $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");

              
                        return false;
                    }
                    else{

                        $("#glypcn"+campo).remove();
                        $('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
                        $('#'+campo).parent().children('span').hide();
                        $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
             
                        return true;
                    }
                    
                    
                }
                
            }
            if (campo==='nombres'){
                apellido = document.getElementById(campo).value;
                if( apellido == null || apellido.length == 0 || /^\s+$/.test(apellido) ) {
                    
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#'+campo).parent().children('span').text("Ingrese algo").show();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                    return false;
                    
                }
                else{
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
                    $('#'+campo).parent().children('span').hide();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                    return true;
                    
                } 
            }
            if (campo==='dni'){
                dni = document.getElementById(campo).value;
                if( dni == null || dni.length == 0 || /^\s+$/.test(dni) ) {
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#'+campo).parent().children('span').text("Ingrese algo").show();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                    return false;
                    
                }
                else
                {
                    if( isNaN(dni) ) 
                    {
                        $("#glypcn"+campo).remove();
                        $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                        $('#'+campo).parent().children('span').text("No acepto letras").show();
                        $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                        return false;
                    }
                    else{
                        if (!(/^\d{8}$/.test(dni))) 
                        {
                            $("#glypcn"+campo).remove();
                            $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                            $('#'+campo).parent().children('span').text("Debe ingresar solamente 8 digitos").show();
                            $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                            return false;
                        }
                        else{
                            $("#glypcn"+campo).remove();
                            $('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
                            $('#'+campo).parent().children('span').hide();
                            $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                    
                            return true;
                        }
                        
                    }  
                } 
            }
            if (campo==='email'){
                email = document.getElementById(campo).value;
                if( email == null || email.length == 0 || /^\s+$/.test(email) ) {
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#'+campo).parent().children('span').text("Ingrese algun Email").show();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                        
                    return false;
                    
                }
                else{
                    if (!(/\S+@\S+\.\S+/.test(email))) {
                        $("#glypcn"+campo).remove();
                        $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                        $('#'+campo).parent().children('span').text("Ingrese un Email valido").show();
                        $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                        return false;
                    }
                    else{
                        $("#glypcn"+campo).remove();
                        $('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
                        $('#'+campo).parent().children('span').hide();
                        $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                    
                        return true;
                    }
                }

            }
            if (campo==='genderRadios'){
                opciones = document.getElementsByName(campo);
                var seleccionado = false;
                for(var i=0; i<opciones.length; i++) {    
                  if(opciones[i].checked) {
                    seleccionado = true;
                    break;
                  }
                }
                 
                if(!seleccionado) {
                    $('#male').parent().parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#male').parent().parent().next().append("<span id='sexo'  class='glyphicon glyphicon-remove form-control-feedback'></span>");


                    return false;
                }
                else{
                    $("#sexo").remove();
                    $('#male').parent().parent().parent().attr("class", "form-group has-success");
                    return true;
                }
            }
                if (campo==='pre'){
                apellido = document.getElementById(campo).value;
                if( apellido == null || apellido.length == 0 || /^\s+$/.test(apellido) ) {
                    
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#'+campo).parent().children('span').text("Ingrese algo").show();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                    return false;
                    
                }
                else{
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
                    $('#'+campo).parent().children('span').hide();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                    return true;
                    
                } 
            }
                     if (campo==='preg'){
                apellido = document.getElementById(campo).value;
                if( apellido == null || apellido.length == 0 || /^\s+$/.test(apellido) ) {
                    
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#'+campo).parent().children('span').text("Ingrese algo").show();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                    return false;
                    
                }
                else{
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
                    $('#'+campo).parent().children('span').hide();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                    return true;
                    
                } 
            }
                       if (campo==='pregu'){
                apellido = document.getElementById(campo).value;
                if( apellido == null || apellido.length == 0 || /^\s+$/.test(apellido) ) {
                    
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#'+campo).parent().children('span').text("Ingrese algo").show();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                    return false;
                    
                }
                else{
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
                    $('#'+campo).parent().children('span').hide();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                    return true;
                    
                } 
            }
                            if (campo==='pregun'){
                apellido = document.getElementById(campo).value;
                if( apellido == null || apellido.length == 0 || /^\s+$/.test(apellido) ) {
                    
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#'+campo).parent().children('span').text("Ingrese algo").show();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                    return false;
                    
                }
                else{
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
                    $('#'+campo).parent().children('span').hide();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                    return true;
                    
                } 
            }
                                        if (campo==='pregunt'){
                apellido = document.getElementById(campo).value;
                if( apellido == null || apellido.length == 0 || /^\s+$/.test(apellido) ) {
                    
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#'+campo).parent().children('span').text("Ingrese algo").show();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                    return false;
                    
                }
                else{
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
                    $('#'+campo).parent().children('span').hide();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                    return true;
                    
                } 
            }
                                                if (campo==='pregunta'){
                apellido = document.getElementById(campo).value;
                if( apellido == null || apellido.length == 0 || /^\s+$/.test(apellido) ) {
                    
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-error has-feedback");
                    $('#'+campo).parent().children('span').text("Ingrese algo").show();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                    return false;
                    
                }
                else{
                    $("#glypcn"+campo).remove();
                    $('#'+campo).parent().parent().attr("class", "form-group has-success has-feedback");
                    $('#'+campo).parent().children('span').hide();
                    $('#'+campo).parent().append("<span id='glypcn"+campo+"' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                    return true;
                    
                } 
            }
           
        }