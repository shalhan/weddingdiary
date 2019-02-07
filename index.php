<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div class="navbar">
            <ul>
                <li>Home</li>
                <li>About</li>
                <li>Contact Us</li>
            </ul> 
        </div>  

        <script>
            var d = document;
            var r = new XMLHttpRequest();
            var t = '68501fe8d004ef236c0370ce97eef8d1';
            var u = 'http://localhost:8000/check?token='+t+'&current_url='+window.location.href
            r.open("GET", u, true);
            r.onreadystatechange = function () {
                if (r.readyState != 4 || r.status != 200) return;
                if(JSON.parse(r.responseText).code == 1) setIframe(t);
            };
            r.send("banana=yellow");
            
            function setIframe(t) {
                //get query
                var u = new URLSearchParams(window.location.search);
                var q = u.get('couple');
                //create iframe
                var i = d.createElement('iframe');
                //styling iframe
                i.style.width = "100%";
                i.style.height = "100vh";
                i.style.border = "none";
                i.src = 'http://localhost:8000?couple='+q+'&token='+t;
                //styling body
                d.body.style.margin = "0";
                d.body.appendChild(i);
                //change title
                d.title = "HALO SEMUA"
            }
        </script>
    </body>
</html>