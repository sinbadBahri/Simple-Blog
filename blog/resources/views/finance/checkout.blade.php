<x-app-layout>

      <body>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <form method="POST" action="{{ route('checkout') }}">
                            @csrf
                    
                            <h2>You've done most of the proccess !!!</h2>
                            <br>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                              </div>
                              <br><br>
                              <h4>
                                  You should pay : {{ $amount }} t
                                  
                                </h4>
                              <br>
                              To finish the process, choose your gateway here...
                            <select class="form-select" aria-label="Default select example" name="gateway">
                                <option selected value="saman">Saman Bank</option>
                                <option value="idpay">ID PAY Gateway</option>    
                            </select>
                            <br>
                            <br>
                    
                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" name="amount" class="btn btn-info" value="{{ $amount }}">Purchase</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>