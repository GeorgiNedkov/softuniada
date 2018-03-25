$("#myselect").on("change", function () {
                var value = $(this).val().toLowerCase();
                $("#mylistItem ").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#mylistItem ").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    
                });
            });