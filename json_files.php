<?php
header('Content-type: text/json');
?>
[
{
    "text": "build",
    "expanded": true,
    "children":     [
                {
            "text": "core",
            "expanded": false,
            "children":             [
                                {
                    "text": "combo",
                    "expanded": false,
                    "children":                     [
                                                {
                            "text": "arch",
                            "expanded": false,
                            "children":                             [
                                                                {
                                    "text": "arm",
                                    "expanded": false,
                                    "children":                                     [
                                        {"text": "<a href=\"/build/core/combo/arch/arm/armv4t.php\">armv4t.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/arm/armv5te-vfp.php\">armv5te-vfp.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/arm/armv5te.php\">armv5te.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/arm/armv6-vfp.php\">armv6-vfp.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/arm/armv6j.php\">armv6j.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/arm/armv7-a-neon.php\">armv7-a-neon.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/arm/armv7-a.php\">armv7-a.php<\/a>"}
                                    ]
                                },
                                                                {
                                    "text": "mips",
                                    "expanded": false,
                                    "children":                                     [
                                        {"text": "<a href=\"/build/core/combo/arch/mips/mips32-fp.php\">mips32-fp.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/mips/mips32.php\">mips32.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/mips/mips32r2-fp.php\">mips32r2-fp.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/mips/mips32r2.php\">mips32r2.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/mips/mips32r2dsp-fp.php\">mips32r2dsp-fp.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/mips/mips32r2dsp.php\">mips32r2dsp.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/mips/mips32r2dspr2-fp.php\">mips32r2dspr2-fp.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/mips/mips32r2dspr2.php\">mips32r2dspr2.php<\/a>"}
                                    ]
                                },
                                                                {
                                    "text": "x86",
                                    "expanded": false,
                                    "children":                                     [
                                        {"text": "<a href=\"/build/core/combo/arch/x86/x86-atom.php\">x86-atom.php<\/a>"},
                                        {"text": "<a href=\"/build/core/combo/arch/x86/x86.php\">x86.php<\/a>"}
                                    ]
                                }
                            ]
                        },
                        {"text": "<a href=\"/build/core/combo/HOST_darwin-x86.php\">HOST_darwin-x86.php<\/a>"},
                        {"text": "<a href=\"/build/core/combo/HOST_linux-x86.php\">HOST_linux-x86.php<\/a>"},
                        {"text": "<a href=\"/build/core/combo/HOST_windows-x86.php\">HOST_windows-x86.php<\/a>"},
                        {"text": "<a href=\"/build/core/combo/javac.php\">javac.php<\/a>"},
                        {"text": "<a href=\"/build/core/combo/select.php\">select.php<\/a>"},
                        {"text": "<a href=\"/build/core/combo/TARGET_linux-arm.php\">TARGET_linux-arm.php<\/a>"},
                        {"text": "<a href=\"/build/core/combo/TARGET_linux-mips.php\">TARGET_linux-mips.php<\/a>"},
                        {"text": "<a href=\"/build/core/combo/TARGET_linux-x86.php\">TARGET_linux-x86.php<\/a>"}
                    ]
                },
                                {
                    "text": "tasks",
                    "expanded": false,
                    "children":                     [
                        {"text": "<a href=\"/build/core/tasks/apicheck.php\">apicheck.php<\/a>"},
                        {"text": "<a href=\"/build/core/tasks/collect_gpl_sources.php\">collect_gpl_sources.php<\/a>"},
                        {"text": "<a href=\"/build/core/tasks/cts.php\">cts.php<\/a>"},
                        {"text": "<a href=\"/build/core/tasks/factory_bundle.php\">factory_bundle.php<\/a>"},
                        {"text": "<a href=\"/build/core/tasks/factory_ramdisk.php\">factory_ramdisk.php<\/a>"},
                        {"text": "<a href=\"/build/core/tasks/ide.php\">ide.php<\/a>"},
                        {"text": "<a href=\"/build/core/tasks/kernel.php\">kernel.php<\/a>"},
                        {"text": "<a href=\"/build/core/tasks/product-graph.php\">product-graph.php<\/a>"},
                        {"text": "<a href=\"/build/core/tasks/sdk-addon.php\">sdk-addon.php<\/a>"},
                        {"text": "<a href=\"/build/core/tasks/vendor_module_check.php\">vendor_module_check.php<\/a>"}
                    ]
                },
                {"text": "<a href=\"/build/core/base_rules.php\">base_rules.php<\/a>"},
                {"text": "<a href=\"/build/core/binary.php\">binary.php<\/a>"},
                {"text": "<a href=\"/build/core/build_id.php\">build_id.php<\/a>"},
                {"text": "<a href=\"/build/core/checktree.php\">checktree.php<\/a>"},
                {"text": "<a href=\"/build/core/cleanbuild.php\">cleanbuild.php<\/a>"},
                {"text": "<a href=\"/build/core/cleanspec.php\">cleanspec.php<\/a>"},
                {"text": "<a href=\"/build/core/clear_vars.php\">clear_vars.php<\/a>"},
                {"text": "<a href=\"/build/core/config.php\">config.php<\/a>"},
                {"text": "<a href=\"/build/core/copy_headers.php\">copy_headers.php<\/a>"},
                {"text": "<a href=\"/build/core/definitions.php\">definitions.php<\/a>"},
                {"text": "<a href=\"/build/core/device.php\">device.php<\/a>"},
                {"text": "<a href=\"/build/core/dex_preopt.php\">dex_preopt.php<\/a>"},
                {"text": "<a href=\"/build/core/distdir.php\">distdir.php<\/a>"},
                {"text": "<a href=\"/build/core/droiddoc.php\">droiddoc.php<\/a>"},
                {"text": "<a href=\"/build/core/dumpvar.php\">dumpvar.php<\/a>"},
                {"text": "<a href=\"/build/core/dynamic_binary.php\">dynamic_binary.php<\/a>"},
                {"text": "<a href=\"/build/core/envsetup.php\">envsetup.php<\/a>"},
                {"text": "<a href=\"/build/core/executable.php\">executable.php<\/a>"},
                {"text": "<a href=\"/build/core/filter_symbols.php\">filter_symbols.php<\/a>"},
                {"text": "<a href=\"/build/core/find-jdk-tools-jar.php\">find-jdk-tools-jar.php<\/a>"},
                {"text": "<a href=\"/build/core/help.php\">help.php<\/a>"},
                {"text": "<a href=\"/build/core/host_executable.php\">host_executable.php<\/a>"},
                {"text": "<a href=\"/build/core/host_java_library.php\">host_java_library.php<\/a>"},
                {"text": "<a href=\"/build/core/host_native_test.php\">host_native_test.php<\/a>"},
                {"text": "<a href=\"/build/core/host_prebuilt.php\">host_prebuilt.php<\/a>"},
                {"text": "<a href=\"/build/core/host_shared_library.php\">host_shared_library.php<\/a>"},
                {"text": "<a href=\"/build/core/host_static_library.php\">host_static_library.php<\/a>"},
                {"text": "<a href=\"/build/core/java.php\">java.php<\/a>"},
                {"text": "<a href=\"/build/core/java_library.php\">java_library.php<\/a>"},
                {"text": "<a href=\"/build/core/legacy_prebuilts.php\">legacy_prebuilts.php<\/a>"},
                {"text": "<a href=\"/build/core/linaro_compilerchecks.php\">linaro_compilerchecks.php<\/a>"},
                {"text": "<a href=\"/build/core/llvm_config.php\">llvm_config.php<\/a>"},
                {"text": "<a href=\"/build/core/main.php\">main.php<\/a>"},
                {"text": "<a href=\"/build/core/Makefile.php\">Makefile.php<\/a>"},
                {"text": "<a href=\"/build/core/multi_prebuilt.php\">multi_prebuilt.php<\/a>"},
                {"text": "<a href=\"/build/core/native_test.php\">native_test.php<\/a>"},
                {"text": "<a href=\"/build/core/node_fns.php\">node_fns.php<\/a>"},
                {"text": "<a href=\"/build/core/notice_files.php\">notice_files.php<\/a>"},
                {"text": "<a href=\"/build/core/package.php\">package.php<\/a>"},
                {"text": "<a href=\"/build/core/pathmap.php\">pathmap.php<\/a>"},
                {"text": "<a href=\"/build/core/pdk_config.php\">pdk_config.php<\/a>"},
                {"text": "<a href=\"/build/core/phony_package.php\">phony_package.php<\/a>"},
                {"text": "<a href=\"/build/core/post_clean.php\">post_clean.php<\/a>"},
                {"text": "<a href=\"/build/core/prebuilt.php\">prebuilt.php<\/a>"},
                {"text": "<a href=\"/build/core/product.php\">product.php<\/a>"},
                {"text": "<a href=\"/build/core/product_config.php\">product_config.php<\/a>"},
                {"text": "<a href=\"/build/core/qcom_utils.php\">qcom_utils.php<\/a>"},
                {"text": "<a href=\"/build/core/raw_executable.php\">raw_executable.php<\/a>"},
                {"text": "<a href=\"/build/core/raw_static_library.php\">raw_static_library.php<\/a>"},
                {"text": "<a href=\"/build/core/root.php\">root.php<\/a>"},
                {"text": "<a href=\"/build/core/shared_library.php\">shared_library.php<\/a>"},
                {"text": "<a href=\"/build/core/static_java_library.php\">static_java_library.php<\/a>"},
                {"text": "<a href=\"/build/core/static_library.php\">static_library.php<\/a>"},
                {"text": "<a href=\"/build/core/version_defaults.php\">version_defaults.php<\/a>"}
            ]
        },
                {
            "text": "target",
            "expanded": false,
            "children":             [
                                {
                    "text": "board",
                    "expanded": false,
                    "children":                     [
                        {"text": "<a href=\"/build/target/board/board.php\">board.php<\/a>"},
                        {"text": "<a href=\"/build/target/board/emulator.php\">emulator.php<\/a>"},
                        {"text": "<a href=\"/build/target/board/generic.php\">generic.php<\/a>"},
                        {"text": "<a href=\"/build/target/board/generic_mips.php\">generic_mips.php<\/a>"},
                        {"text": "<a href=\"/build/target/board/generic_x86.php\">generic_x86.php<\/a>"},
                        {"text": "<a href=\"/build/target/board/vbox_x86.php\">vbox_x86.php<\/a>"}
                    ]
                },
                                {
                    "text": "product",
                    "expanded": false,
                    "children":                     [
                        {"text": "<a href=\"/build/target/product/AndroidProducts.php\">AndroidProducts.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/base.php\">base.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/core.php\">core.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/emulator.php\">emulator.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/full.php\">full.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/full_base.php\">full_base.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/full_base_telephony.php\">full_base_telephony.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/full_mips.php\">full_mips.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/full_x86.php\">full_x86.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/generic.php\">generic.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/generic_mips.php\">generic_mips.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/generic_no_telephony.php\">generic_no_telephony.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/generic_x86.php\">generic_x86.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/languages_full.php\">languages_full.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/languages_small.php\">languages_small.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/large_emu_hw.php\">large_emu_hw.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/locales_full.php\">locales_full.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/mini.php\">mini.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/sdk.php\">sdk.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/sdk_mips.php\">sdk_mips.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/sdk_x86.php\">sdk_x86.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/security.php\">security.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/telephony.php\">telephony.php<\/a>"},
                        {"text": "<a href=\"/build/target/product/vbox_x86.php\">vbox_x86.php<\/a>"}
                    ]
                }
            ]
        }
    ]
}
]
