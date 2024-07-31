<x-app-layout>
      <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.84.0">
      <title>Pricing example · Bootstrap v5.0</title>

      <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/pricing/">

      

      <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

      <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>

      
      <!-- Custom styles for this template -->
      <link href="pricing.css" rel="stylesheet">
    </head>
    <body>
      
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check" viewBox="0 0 16 16">
      <title>Check</title>
      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
    </symbol>
  </svg>

  <div class="container py-3">
    <header>

      <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Pricing</h1>
        <p class="fs-5 text-muted">Buy purchasing VIP packages, you would become an Admin user !!!</p>
      </div>
    </header>

    <main>
      <form action="/vip-purchase" method="GET">
        @csrf

        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">1 Month</h4>
              </div>
              <div class="card-body" name="amount" >
                <h1 class="card-title pricing-card-title">100,000 <small class="text-muted fw-light">t</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                  <li>10 users included</li>
                  <li>2 GB of storage</li>
                  <li>Email support</li>
                  <li>Help center access</li>
                </ul>
                <button type="submit" name="amount" class="w-100 btn btn-lg btn-outline-primary" value="100000">Get started</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal">1 Year</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">1,000,000 <small class="text-muted fw-light">t</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                  <li>20 users included</li>
                  <li>10 GB of storage</li>
                  <li>Priority email support</li>
                  <li>Help center access</li>
                </ul>
                <button type="submit" name="amount" class="w-100 btn btn-lg btn-primary" value="1000000">Get started</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
              <div class="card-header py-3 text-white bg-primary border-primary">
                <h4 class="my-0 fw-normal">Unlimited</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">3,000,000 <small class="text-muted fw-light">t</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                  <li>30 users included</li>
                  <li>15 GB of storage</li>
                  <li>Phone and email support</li>
                  <li>Help center access</li>
                </ul>
                <button type="submit" name="amount" class="w-100 btn btn-lg btn-primary" value="3000000">Get started</button>
              </div>
            </div>
          </div>
        </div>
      </form>

    

    
  </div>


      
    </body>
  </html>

</x-app-layout>