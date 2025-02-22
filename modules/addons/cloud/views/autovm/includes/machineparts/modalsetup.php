<!-- SAME -->









<!-- Setup (Second Modal)  -->
<div class="modal fade modal-lg" id="setupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="setupModalLabel"
aria-hidden="false" style="--bs-modal-width: 800px;">
    <div class="modal-dialog ">
        <div class="modal-content border-0">
            <!-- Modal Body -->
            <div class="m-0 p-0 p-md-3">

                <!-- machine is not yet loaded -->
                <div v-if="!machineIsLoaded" class="modal-body bg-white" style="min-height: 350px !important;">
                    <div class="row m-0 p-0">
                        <div class="col-12">
                            <p class="text-start h5 py-3">
                                <span class="text-primary">
                                    {{ lang('waittofetch') }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
        
                <!-- machine is Loaded, ready for setup -->
                <div v-if="machineIsLoaded" class="modal-body" style="min-height: 350px !important;">
                    
                    <!-- actionStatus: complete (1Ready, 2Finished) -->
                    <div v-if="actionStatus == 'completed' && !isBetweenPending">
                        
                        <!-- 1Ready to install, just open the window -->
                        <div v-if="confirmDialog">
                            <div class="row m-0 p-0">
                                <div class="col-12 col-md-9">
                                    <p class="text-start h4 mt-4">{{ lang('confirmtext') }}</p>
                                    <p class="text-start h5 py-3">
                                        {{ lang('goingtoinstall') }}
                                        (<span class="text-primary fw-bold px-0" v-text="tempNameSetup"></span>)
                                        {{ lang('onyourmachine') }}
                                    </p>
                                </div>
                                <div class="col-12 col-md-3 p-0 m-0 d-none d-md-block py-4 rounded-4 align-items-center text-center " style="background-color: #e7edf7 !important;">
                                    <img class="rounded-4" :src="findTemplateIcon.address" alt="tempIconSetup" width="70">
                                    <p class="text-primary fw-bold p-0 m-0 pt-3" v-text="tempNameSetup"></p>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <p class="col-11 text-start mt-4 alert alert-danger position-absolute bottom-0">
                                    <span class="spinner-grow text-danger" style="--bs-spinner-width: 0px; --bs-spinner-height: 0px; --bs-spinner-animation-speed: 2s;"><i class="bi bi-exclamation-diamond"></i></span>
                                    <span class="ms-4">{{ lang('alert') }}</span>
                                    <span> : </span>
                                    <span>{{ lang('installationalert') }}</span>
                                </p>
                            </div>
                        </div>
                        
                        
                        <!-- 2 instalation finished-->
                        <div v-if="!confirmDialog">
                            <div class="row m-0 p-0">
                                <div class="col-12 col-md-9">
                                    <p class="text-start h5 py-3">
                                        <span class="text-primary pe-2" v-text="tempNameSetup"></span>
                                        <span>{{ lang('installedsuccessfully') }}</span>
                                    </p>
                                    <p class="pt-5 h6">{{ lang('accountinformation') }}</p>
                                    <div class="row">
                                        <p class="m-0 pt-3 pb-2 h6">{{ lang('username') }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="input-group d-flex flex-row justify-content-start">
                                            <div class="input-group-text rounded" style="min-width: 200px;">
                                                <span v-if="machineUserName" class="text-dark fs-6">{{ machineUserName }}</span>
                                                <span v-if="!machineUserName" class="text-dark fs-6">---</span>
                                            </div>
                                            <div class="col-auto m-0 p-0 ps-4">
                                                <i class="bi bi-person-check-fill fs-4 col-auto m-0 p-0"></i>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="row">
                                        <p class="m-0 pt-3 pb-2 h6">{{ lang('password') }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="input-group d-flex flex-row justify-content-start">
                                            <div class="input-group-text rounded" style="min-width: 200px;">
                                                <span v-if="machineUserPass" class="text-dark fs-6">{{ machineUserPass }}</span>
                                                <span v-if="!machineUserPass" class="text-dark fs-6">---</span>
                                            </div>
                                            <div class="col-auto m-0 p-0 ps-4">
                                                <i class="bi bi-key-fill fs-4 col-auto m-0 p-0"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 p-0 m-0 d-none d-md-block py-4 rounded-4 align-items-center text-center">
                                    <img class="rounded-4" :src="findTemplateIcon.address" alt="tempIconSetup" width="70">
                                    <p class="text-primary fw-bold p-0 m-0 pt-3" v-text="tempNameSetup"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!-- actionStatus: failed  -->
                    <div v-if="actionStatus == 'failed' && !isBetweenPending">
                        <div v-if="confirmDialog">
                            <div class="row m-0 p-0">
                                <div class="col-12 col-md-9">
                                    <p class="text-start h4 mt-4">{{ lang('failactionmsg') }}</p>
                                    <p class="text-start h5 py-3">
                                        {{ lang('goingtoinstall') }}
                                        (<span class="text-primary fw-bold px-0" v-text="tempNameSetup"></span>)
                                        {{ lang('onyourmachine') }}
                                    </p>
                                </div>
                                <div class="col-12 col-md-3 p-0 m-0 d-none d-md-block py-4 rounded-4 align-items-center text-center " style="background-color: #e7edf7 !important;">
                                    <img class="rounded-4" :src="findTemplateIcon.address" alt="tempIconSetup" width="70">
                                    <p class="text-primary fw-bold p-0 m-0 pt-3" v-text="tempNameSetup"></p>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <p class="col-11 text-start mt-4 alert alert-danger position-absolute bottom-0">
                                    <span class="spinner-grow text-danger" style="--bs-spinner-width: 0px; --bs-spinner-height: 0px; --bs-spinner-animation-speed: 2s;"><i class="bi bi-exclamation-diamond"></i></span>
                                    <span class="ms-4">{{ lang('alert') }}</span>
                                    <span> : </span>
                                    <span>{{ lang('installationalert') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- actionStatus == 'pending' -->
                    <div v-if="actionStatus == 'pending' || isBetweenPending" class="m-0 p-0">
                        <div class="row m-0 p-0 pt-5">
                            <div class="col-12 col-md-9 text-start">
                                <p class="text-start h5 py-3">{{ lang('waitforsetup') }}</p>
                                
                                <p class="text-start h6 pt-5">
                                    {{ lang('goingtoinstall') }}
                                    (<span class="text-primary fw-bold px-0" v-text="tempNameSetup"></span>)
                                    {{ lang('onyourmachine') }}
                                </p>
                                
                            </div>
                        </div>
                    </div>
                        
                    <!-- actionStatus == 'processing' -->
                    <div v-if="actionStatus == 'processing'" class="m-0 p-0">
                        <div  class="row m-0 p-0">
                            <div class="col-12 col-md-9 text-start">
                                <p class="text-start h4 py-3">
                                    <span>{{ lang('machineisinstalling') }}</span>
                                    <span class="text-primary" v-text="tempNameSetup"></span>
                                </p>
                                <p class="fs-5">{{ lang('dontclose') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Modal Footer -->
            <!-- Not data, or pending -->
            <div v-if="!machineIsLoaded" class="d-flex flex-row-reverse modal-footer justify-content-between">      
                <div class="d-flex flex-row-reverse">
                    <button @click="closeConfirmDialog" type="button" class="btn btn-secondary px-4 mx-2 border-0" data-bs-dismiss="modal">
                        {{ lang('close') }}
                    </button>
                </div>
            </div>  

            <div v-if="machineIsLoaded" class="d-flex flex-row modal-footer justify-content-between">
                
                <!-- Completed, Just open (ConfirmDialog=true)-->
                
                <!-- Last Action -->
                <?php include('pendingdropdown.php'); ?>

                
                <div class="d-flex flex-row align-items-center">
                    <!-- Close Btn -->
                    <button v-if="actionStatus != 'pending' && actionStatus != 'processing'" @click="closeConfirmDialog" type="button"
                        class="btn btn-secondary px-4 mx-2 border-0"
                        data-bs-dismiss="modal">
                            {{ lang('close') }}                            
                    </button>
                    
                    <!-- Action BTN 'completed' -->
                    <div v-if="actionStatus == 'completed' && confirmDialog">
                        <button @click="acceptConfirmDialog" type="button" class="btn btn-danger px-5 mx-2">
                            <i class="bi bi-exclamation-diamond"></i>    
                            <span class="fw-light px-1">{{ lang('clearandinstall') }}</span>
                        </button>
                    </div>

                    <!-- Action BTN 'failed' -->
                    <div v-if="actionStatus == 'failed' && confirmDialog">
                        <button @click="acceptConfirmDialog" type="button" class="btn btn-danger px-5 mx-2">
                            <i class="bi bi-exclamation-diamond"></i>    
                            <span class="fw-light px-1">{{ lang('clearandinstall') }}</span>
                        </button>
                    </div>

                    <!-- Show State BTN -->
                    <div v-if="actionStatus == 'pending' || actionStatus == 'processing'">
                        <button type="button" class="btn btn-primary px-5 mx-2">
                            <span class="">{{ lang('installing') }}</span>
                            <span class="px-1">({{tempNameSetup}})</span>
                            

                            <!-- spinner -->
                            <span class="spinner-grow text-light my-auto mb-0 align-middle ms-1" style="--bs-spinner-width: 5px; --bs-spinner-height: 5px; --bs-spinner-animation-speed: 1s;"></span>
                            <span class="spinner-grow text-light my-auto mb-0 align-middle mx-1" style="--bs-spinner-width: 5px; --bs-spinner-height: 5px; --bs-spinner-animation-speed: 1s;"></span>
                            <span class="spinner-grow text-light my-auto mb-0 align-middle me-1" style="--bs-spinner-width: 5px; --bs-spinner-height: 5px; --bs-spinner-animation-speed: 1s;"></span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><!-- end modal -->