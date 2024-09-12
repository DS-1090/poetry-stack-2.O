    function f() {
        var l = document.getElementById("like");
        l.src = "images/filled.png";
    }
    function submitComment() {
        var commentText = document.getElementById("comment").value;
        var poemname = document.getElementById("poemname").innerHTML;


        fetch('1temp.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'text=' + encodeURIComponent(commentText) + '&name=' + encodeURIComponent(poemname),
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        document.getElementById("result").innerHTML = "Thank you!";
        document.getElementById("comment").value = "";
    }


