
<div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Knowledge Base</h2>
        {{-- <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p> --}}
    </div> 
    

        <div id="accordion-collapse" data-accordion="collapse">

              @foreach ($deparment as $key => $item)
                  <h2 id="accordion-collapse-heading-{{ $item->id }}">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-{{ $item->id }}" aria-expanded="true" aria-controls="accordion-collapse-body-{{ $item->id }}">
                      <span>{{ $item->department_name }}</span>
                      <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </h2>
               
                <div id="accordion-collapse-body-{{ $item->id }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $item->id }}">
                  <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                          @foreach($pdf as $pdfs)
                              @if($item->id==$pdfs->department_id)
                              <p class="mb-2 text-gray-900 dark:text-gray-900"> <a href="{{ URL('images/pdf/department/' . $item->department_name . '/' . $pdfs->file_path) }}"> {{ $pdfs->pdf_name }} </a></p>
                       
                              @endif
                          @endforeach
                  </div>
                </div>
              @endforeach

       </div>
  
</div>

