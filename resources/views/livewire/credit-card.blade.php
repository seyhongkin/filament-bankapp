<div @class([
    'bg-gradient-to-r from-violet-600 to-indigo-600 text-white border-0' => $isDefault,
    'w-96 h-56 rounded-xl relative text-gray-700 border shadow-2xl transition-transform transform hover:scale-110',
])>
    <div class="w-full px-8 absolute top-8 space-y-8">
        <div class="flex justify-between">
            <div class="">
                <p class="font-light text-xs">
                    Balance
                </p>
                <p class="font-medium">
                    $5,742
                </p>
            </div>
            @if ($isDefault)
                <svg class="w-10 h-10" width="35" height="35" viewBox="0 0 35 35" fill="none"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="34.7713" height="34.7713" fill="url(#pattern0_78_444)" />
                    <defs>
                        <pattern id="pattern0_78_444" patternContentUnits="objectBoundingBox" width="1"
                            height="1">
                            <use xlink:href="#image0_78_444" transform="scale(0.01)" />
                        </pattern>
                        <image id="image0_78_444" width="100" height="100" preserveAspectRatio="none"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
            @else
                <svg class="w-10 h-10" width="35" height="35" viewBox="0 0 35 35" fill="none"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="34.7713" height="34.7713" fill="url(#pattern0_78_461)" />
                    <defs>
                        <pattern id="pattern0_78_461" patternContentUnits="objectBoundingBox" width="1"
                            height="1">
                            <use xlink:href="#image0_78_461" transform="scale(0.01)" />
                        </pattern>
                        <image id="image0_78_461" width="100" height="100" preserveAspectRatio="none"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
            @endif




        </div>
        <div class="flex gap-10">
            <div>
                <p class="font-light text-xs uppercase">
                    Card Holder
                </p>
                <p class="font-medium">
                    Eddy Cusuma
                </p>
            </div>

            <div>
                <p class="font-light text-xs uppercase">
                    Valid Thru
                </p>
                <p class="font-medium">
                    12/22
                </p>
            </div>
        </div>
        <div>
            <div class="flex justify-between">
                <h1>3778 **** **** 1234</h1>

                <div class="">
                    @if ($isDefault)
                        <svg width="44" height="30" viewBox="0 0 44 30" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="15" r="15" fill="white" fill-opacity="0.5" />
                            <circle cx="29" cy="15" r="15" fill="white" fill-opacity="0.5" />
                        </svg>
                    @else
                        <svg width="44" height="30" viewBox="0 0 44 30" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="15" r="15" fill="#9199AF" fill-opacity="0.5" />
                            <circle cx="29" cy="15" r="15" fill="#9199AF" fill-opacity="0.5" />
                        </svg>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
