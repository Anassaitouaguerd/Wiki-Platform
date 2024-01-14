

  tinymce.init({

    selector: 'textarea#tiny',

        plugins: [

        'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',

        'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',

        'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'

        ],

        toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify |' +

        'bullist numlist checklist outdent indent | removeformat | code table help'

  })

