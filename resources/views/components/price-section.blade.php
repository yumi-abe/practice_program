<div class="text-center">
<h2 class="text-2xl font-bold text-white ml- mb-7"><img class="mx-auto" src="{{ asset('img/price1x.png') }}" alt="news"></h2>
</div>
{{-- <section class="text-gray-600 body-font"> --}}
    <div class="container px-5 py-5 mx-auto">

      <div class="lg:w-2/3 w-full mx-auto overflow-auto">
        <table class="table-auto w-full whitespace-no-wrap text-center">
                
          <thead>
            <tr>
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300"></th>
              @foreach ( $planList as $plan )
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">{{ $plan->plan_name }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            <tr>
            <th class="px-4 py-3 border-t-2 border-gray-100 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">平日</th>
              @foreach ( $planList as $plan )
              <td class="px-4 py-3 border-t-2 border-gray-100 bg-gray-100">{{ number_format($plan->weekday_price) }}円</td>
              @endforeach
            </tr>
            <tr>
                <th class="px-4 py-3 border-t-2 border-gray-100 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">休日</th>
                  @foreach ( $planList as $plan )
                  <td class="px-4 py-3 border-t-2 border-gray-300 bg-gray-100">{{ number_format($plan->holiday_price) }}円</td>
                  @endforeach
                </tr>
          </tbody>
        </table>
        <p class="mt-2 ml-1">
            お得な月間フリーパスもございます。
            <br>詳しくはスタッフにお問い合わせください。</a>
        </p>
      </div>
    </div>