<SpladeSelect
    <?php echo e($attributes->only(['v-if', 'v-show', 'class'])); ?>

    :choices="<?php echo \Illuminate\Support\Js::from($choicesOptions())->toHtml() ?>"
    :js-choices-options="<?php echo $jsChoicesOptions(); ?>"
    :multiple="<?php echo \Illuminate\Support\Js::from($multiple)->toHtml() ?>"
    :placeholder="<?php echo \Illuminate\Support\Js::from($placeholderOption()?->toArray() ?: false)->toHtml() ?>"
    v-model="<?php echo e($vueModel()); ?>"
    :dusk="<?php echo \Illuminate\Support\Js::from($attributes->get('dusk'))->toHtml() ?>"
    :remote-url="<?php echo $remoteUrl ?: 'null'; ?>"
    :remote-root="<?php echo \Illuminate\Support\Js::from($remoteRoot ?: null)->toHtml() ?>"
    :option-value="<?php echo \Illuminate\Support\Js::from($optionValue)->toHtml() ?>"
    :option-label="<?php echo \Illuminate\Support\Js::from($optionLabel)->toHtml() ?>"
    :select-first-remote-option="<?php echo \Illuminate\Support\Js::from($selectFirstRemoteOption)->toHtml() ?>"
    :reset-on-new-remote-url="<?php echo \Illuminate\Support\Js::from($resetOnNewRemoteUrl)->toHtml() ?>"
>
    <template #default="<?php echo $scope; ?>">
        <label class="block" v-bind:class="{ 'pointer-events-none': select.loading }">
            <?php echo $__env->renderWhen($label, 'splade::form.label', ['label' => $label], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

            <div class="relative">
                <div v-bind:class="{ 'opacity-50': select.loading }">
                    <select <?php echo e($attributes->except(['v-if', 'v-show', 'class'])->class([
                        'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 disabled:opacity-50',
                    ])->merge([
                        'multiple' => $multiple,
                        'name' => $name,
                        'v-model' => $choicesOptions() ? null : $vueModel(),
                        'data-validation-key' => $validationKey(),
                    ])); ?> >
                        <?php if(trim($slot)): ?>
                            <?php echo e($slot); ?>

                        <?php else: ?>
                            <?php $__currentLoopData = $options(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('splade::form.select-child', ['selectChild' => $selectChild], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="absolute inset-0 w-full h-full" v-if="select.loading">
                    <div class="flex flex-row items-center justify-center w-full h-full">
                        <svg
                            class="animate-spin mr-3 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        >
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                        </svg>
                    </div>
                </div>
            </div>
        </label>

        <?php echo $__env->renderWhen($help, 'splade::form.help', ['help' => $help], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        <?php echo $__env->renderWhen($showErrors, 'splade::form.error', ['name' => $validationKey()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
    </template>
</SpladeSelect><?php /**PATH C:\xampp\htdocs\hms\vendor\protonemedia\laravel-splade\src/../resources/views/form/select.blade.php ENDPATH**/ ?>