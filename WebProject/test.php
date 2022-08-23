<html>
    <head>
    <script type="text/javascript">
    function submitForm() { // submits form
        document.getElementById("ismForm").submit();
    }
    function btnSearchClick()
    {
        if (document.getElementById("ismForm")) {
            setTimeout("submitForm()", 5000); // set timout 
       }
    }
    </script>
    </head>
    <body>
    <form method="get" id="ismForm" name="ismForm" action="http://www.test.com" class=""> 
    <label for="searchBox">Search </label>
    <input type="text" id="searchBox" name="q" value=""> <input type="hidden" id="sayTminLength" value="3">
    <input type="hidden" id="coDomain" value="US">
    <input class="button" onclick="btnSearchClick();" type="button" id="search.x" name="search.x" value="Search" autocomplete="off"> 
    </form>
    </body>
    </html>