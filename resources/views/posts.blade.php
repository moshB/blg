
<x-layout>
    <botton onclick="test()">hi</botton>
    <botton onclick="test2()">hi</botton>
    @foreach ($posts as $post)

        <article>
            <h1>
                <a href="/posts/{{$post->slug}}">
                    {{$post->title}}
                </a>
            </h1>
            <div>
                {{ $post->excerpt}}
            </div>
        </article>
    @endforeach
</x-layout>
<script>
    function test(){
        alert('hello')
    }
    function test2() {
        console.log("go")
        $.ajax({
            url: 'http://localhost:8000/sendEmailToUserAfter24Hours',
            type: 'POST',
            data: {
                testId: 259
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log('email sent');
                // activateSnackBarApproval('Email Sent !')
                // //setTimeout(() => closeSnackBar() , 3000 )
                // $("#exampleModalCenter").modal('hide');
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log({XMLHttpRequest, textStatus, errorThrown})
                alert("some error");
            }
        })
    }
</script>
