const table = document.getElementById("result-table")

$.ajax({
        url: "php/send_table.php",
        type: "GET",
        dataType: "html",
        success: function (data) {
            table.insertAdjacentHTML('beforeend', data);
        }
    })
$("#clear").on("click",function (){
    $.ajax({
        url:"php/clear_table.php",
        type: "GET",
        success: function () {
            table.innerHTML = " <tr>\n" +
                "                <th>№</th>\n" +
                "                <th>X</th>\n" +
                "                <th>Y</th>\n" +
                "                <th>R</th>\n" +
                "                <th>Result</th>\n" +
                "                <th>Attempt time</th>\n" +
                "                <th>Processing time</th>\n" +
                "            </tr>"
        }
    })
})

