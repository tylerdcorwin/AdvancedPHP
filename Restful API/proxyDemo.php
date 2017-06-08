<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <style type="text/css">
            textarea {
                width: 500px;
                height: 100px;
            }

            textarea[name="results"] {
                height: 300px;
            }
        </style>

        <h1>Rest API Demo</h1>

        Verb/HTTP Method:<br />
        <select name="verb">            
            <option value="GET">GET</option>
            <option value="POST">POST</option>
            <option value="PUT">PUT</option>
            <option value="DELETE">DELETE</option>
        </select>
        <br />
        <br />
        Resource for endpoint:<br />
        <input name="resource" value="corp" />
        <br />
        <br />
        Data(optional):<br />   
        Corp <input type="text" name="corp" value="" />
        <br />
        Date <input type="date" name="incorp_dt" value="" />        
        <br />
        Email <input type="email" name="email" value="" />
        <br />
        Owner <input type="text" name="owner" value="" />
        <br />
        Phone <input type="text" name="phone" value="" />
        <br />
        Location <input type="text" name="location" />        
        <br />
        <br />
        <button>Make Call</button>
        <h3>Results</h3>

        <textarea name="results"></textarea>

        <script type="text/javascript">

            document.querySelector('button').addEventListener('click', makeCall);

            function makeCall() {
                var verbfield = document.querySelector('select[name="verb"]');
                var verb = verbfield.options[verbfield.selectedIndex].value;
                var resource = document.querySelector('input[name="resource"]').value;
                var data = {
                    'corp': document.querySelector('input[name="corp"]').value,
                    'incorp_dt': document.querySelector('input[name="incorp_dt"]').value,                   
                    'email': document.querySelector('input[name="email"]').value,
                    'owner': document.querySelector('input[name="owner"]').value,
                    'phone': document.querySelector('input[name="phone"]').value,
                    'location': document.querySelector('input[name="location"]').value                   
                };
                var results = document.querySelector('textarea[name="results"]');

                var httpRequest = new XMLHttpRequest();

                var url = './api/v1/' + resource;

                httpRequest.open(verb, url, true);
                httpRequest.addEventListener('readystatechange', callComplete);

                function callComplete() {
                    if (this.readyState === XMLHttpRequest.DONE) {
                        console.log(this.responseText);
                        results.value = this.responseText;
                    } // else waiting for the call to complete
                }

                if (verb === 'GET') {
                    httpRequest.send(null);
                } else {
                    httpRequest.setRequestHeader('Content-type', 'application/json;charset=UTF-8');
                    httpRequest.send(JSON.stringify(data));
                }
            }
        </script>




        <datalist id="states">
            <option value="Alabama">
            <option value="Alaska">
            <option value="Arizona">
            <option value="Arkansas">
            <option value="California">
            <option value="Colorado">
            <option value="Connecticut">
            <option value="Delaware">
            <option value="Florida">
            <option value="Georgia">
            <option value="Hawaii">
            <option value="Idaho">
            <option value="Illinois">
            <option value="Indiana">
            <option value="Iowa">
            <option value="Kansas">
            <option value="Kentucky">
            <option value="Louisiana">
            <option value="Maine">
            <option value="Maryland">
            <option value="Massachusetts">
            <option value="Michigan">
            <option value="Minnesota">
            <option value="Mississippi">
            <option value="Missouri">
            <option value="Montana">
            <option value="Nebraska">
            <option value="Nevada">
            <option value="New Hampshire">
            <option value="New Jersey">
            <option value="New Mexico">
            <option value="New York">
            <option value="North Carolina">
            <option value="North Dakota">
            <option value="Ohio">
            <option value="Oklahoma">
            <option value="Oregon">
            <option value="Pennsylvania">
            <option value="Rhode Island">
            <option value="South Carolina">
            <option value="South Dakota">
            <option value="Tennessee">
            <option value="Texas">
            <option value="Utah">
            <option value="Vermont">
            <option value="Virginia">
            <option value="Washington">
            <option value="West Virginia">
            <option value="Wisconsin">
            <option value="Wyoming">
        </datalist>

    </body>
</html>
