@extends('admin-dashboard.layouts.app')

@section('site_title', 'Admin Dashboard')

@section('header_tag')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.css">
    
@endsection

@section('bg_image', 'admin-page')

@section('content')


  @php $agent = new Jenssegers\Agent\Agent(); @endphp

  <div class="row pt-3 pb-3 pl-4 pr-4 admin-dashboard-right-section">

    <div class="col-12 col-sm-12 col-md-12 col-lg-12">


    <div class="row">
    <div class="col-12 col-12 col-md-12 col-lg-12">
        <div class="card card-shadow p-3">
        <h5 class="text-deep-purple mb-0">
        All Published Team &nbsp;&nbsp;&nbsp;<span class="badge badge-purple badge-pill">{{ $all_team}}</span>
        <div>

        <hr>
        
        </div>
        </h5>
        <hr class="hr">
        <div>

            <div class="enable-ideas-scrollable">
                @foreach ($publishedIdeasOnlyTeams as $idea)
                    <ul class="list-unstyled recent-ideas-module pt-0 pb-1" style="margin-bottom: 0rem;">
                        <div class="row" class="team-info" style="background-color: #B9B9B9;padding-left:15px;margin-bottom:1rem">
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                <li class="media hr pb-0 mb-2 mt-2" style="float: left">
                                    <h2 style="color: gray;">Team Name: 
                                        <span style="color: rgb(51, 51, 65);font-weight: bold;font-family: roboto;">
                                            {{$idea->idea_teams->team_name}}
                                        </span>
                                    </h2>
                                    
                                </li>
                                <li class="media hr pb-0 mb-2 mt-2" style="float: right">
                                    <h2 style="color: gray;">
                                        Idea: 
                                        <a href="/secure/dashboard/idea/{{$idea->uuid}}" style="color: #5353c7;font-weight: bold;font-family: roboto;">
                                            {{$idea->title}}
                                        </a>
                                    </h2>
                                </li>
                                
                            </div>
                        </div>




                        <div class="idea-submitted-by mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-2">
                                        <strong>Idea Submitted By:</strong>
                                    </div>
                                    <!-- /.mb-2 -->
                                </div>
                                <div class="col-md-8">
                                    @if (!is_null($idea->idea_teams))
                                        <div class="mb-2">
                                            <strong>Team Members:</strong>
                                        </div>
                                        <!-- /.mb-2 -->
                                    @endif
                                </div>
                            </div>
                            
    
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="media">
                                        @if($idea->user->profile_picture != null)
                                            <img src="{{ asset($idea->user->profile_picture) }}" class="mr-2 rounded-circle" height="50" alt="Profile Picture">
                                        @else
                                            <img src="{{asset('img/profile-picture-placeholder.svg')}}" class="mr-2 rounded-circle" height="50" alt="Profile Picture">
                                        @endif
                                        <div class="media-body">
                                            <strong class="mt-0">{{ $idea->user->first_name }} {{ $idea->user->last_name }}</strong>
                                            <p class="mb-0">{{ $idea->user->designation }}</p>
                                            <!-- /.mb-0 -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    @if (!is_null($idea->idea_teams))
                                        <div class="row">
                                            @foreach ($idea->idea_teams->team_members as $user)
                                                <div class="col-md-6 mb-2">
                                                    <div class="media">
                                                        @if($user->profile_picture != null)
                                                            <img src="{{ asset($user->profile_picture) }}" class="mr-2 rounded-circle" height="50" alt="Profile Picture">
                                                        @else
                                                            <img src="{{asset('img/profile-picture-placeholder.svg')}}" class="mr-2 rounded-circle" height="50" alt="Profile Picture">
                                                        @endif
                                                        <div class="media-body">
                                                            <strong class="mt-0">{{ $user->first_name }} {{ $user->last_name }}</strong>
                                                            <p class="mb-0">{{ $user->designation }}</p>
                                                            <!-- /.mb-0 -->
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    
                                    
                                </div>
                            </div>
                            
    
                        </div>



                    </ul>
                @endforeach
                
            </div>
            
        </div>
        <!-- /.enable-ideas-scrollable -->

        </div>
        <!-- /.card card-shadow -->
    </div>
    <!-- /.col-12 col-12 col-md-12 col-lg-12 -->
    </div>
      <!-- /.row -->
    </div>
    <!-- /.col-12 col-sm-12 col-md-12 col-lg-12 -->
  </div>
  <!-- /.row -->

  {{-- <div class="row pt-3 pb-3 pl-4 pr-4 admin-dashboard-right-section">

      <div class="col-12 col-sm-12 col-md-12 col-lg-12">

        <div class="row">
          <div class="col-12 col-12 col-md-12 col-lg-12">
            <div class="card card-shadow p-3">
              <h5 class="text-deep-purple mb-0">{{$idea_name}} &nbsp;&nbsp;&nbsp;<span class="badge badge-purple badge-pill">{{ $ideasCount}}</span>
              </h5>
              <hr class="hr">

              <div class="enable-ideas-scrollable">
                <ul class="list-unstyled recent-ideas-module pt-0 pb-1" v-for="(idea, index) in ideas_published" :key="index">
                  <div class="row">
                      <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                          <li class="media hr pb-0 mb-2 mt-2">

                              <div v-if="idea.user.profile_picture == undefined">
                                <a :href="'/secure/dashboard/idea/' + idea.uuid" target="_blank"><img src="/img/profile-picture-placeholder.svg" class="mr-2 rounded-circle" alt="Profile Picture" height="60"></a>
                              </div>

                              <div v-else>
                              <a :href="'/secure/dashboard/idea/' + idea.uuid" target="_blank"><img :src="'{{asset('/')}}' + idea.user.profile_picture" class="mr-2 rounded-circle" alt="Profile Picture" height="60"></a>
                              </div>

                              <div class="media-body recent-ideas-idea-description">
                                <h5 class="recent-ideas-idea-title" style="color: #FFAD4D;">
                                  <a :href="'/secure/dashboard/idea/' + idea.uuid" target="_blank">@{{ idea.title }}<span class="text-muted">|</span> @{{ idea.topic }}</a>
                                </h5>

                                <div class="row">
                                  <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                                    <p class="mb-1 font-weight-bold recent-ideas-idea-author" style="color: #555555;">@{{ idea.user.first_name }}, @{{ idea.user.designation }}</p>
                                  </div>
                                  <!-- /.col-12 col-sm-8 col-md-8 col-lg-8 -->

                                  <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-right">
                                    <span v-if="idea.is_featured == 1"><span class="is-featured"><img src="{{ asset('img/featured.svg') }}" alt=""></span></span>
                                    <small class="recent-ideas-idea-published-time" style="color: #B9B9B9;">@{{ idea.submitted_at | formatDate }}</small>
                                  </div>
                                  <!-- /.col-12 col-sm-4 col-md-4 col-lg-4 -->
                                </div>
                                <!-- /.row -->

                                <p style="color: #414141;">@{{ idea.elevator_pitch | truncate(300, '...') }}</p>



                                <div class="row" style="display: flex; font-size: 11px;">
                                  <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <div>
                                      <span class="mr-2" style="color: #7B7B7B;">@{{ idea.comments.length }}</span> comments
                                      <img src="{{ asset('img/chat.svg') }}" height="18" alt="" class="ml-2">
                                      <span class="ml-3 mr-2" style="color: #7B7B7B;">@{{idea.likes.length}} likes</span>
                                    </div>
                                  </div>
                                  <!-- /.col-6 col-sm-6 col-md-6 col-lg-6 -->

                                  <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="text-right">


                                      <a :href="'/secure/dashboard/idea/' + idea.uuid" target="_blank" class="view-more-button " style="font-size: 11px;">Full View</a>
                                    </div>
                                    <!-- /.text-right -->
                                  </div>
                                  <!-- /.col-6 col-sm-6 col-md-6 col-lg-6 -->
                                </div>
                                <!-- /.row -->
                              </div>
                            </li>
                      </div>
                      <!-- /.col-12 col-12 col-md-12 col-lg-12 -->

                      <div class="col-12 col-sm-4 col-md-4 col-lg-4 feature_column">
                        <div class="row">
                          <div class="col-12 col-sm-4 col-md-4 col-lg-4"></div>
                          <div class="col-12 col-sm-8 col-md-8 col-lg-8" style="display: flex;">
                              <a v-if="idea.is_featured == 0" @click="makeFeatured(idea.id)"   class="view-more-button make_featured_idea_badge" style="font-size: 11px;">Make Fetured</a>
                              <span v-else  @click="makeNonFeatur(idea.id)"  class="featured_idea_badge" style="font-size: 11px;">Fetured</span>
                          </div>
                        </div>

                      </div>
                      <!-- /.col-12 col-12 col-md-12 col-lg-12 -->
                  </div>


                </ul>
              </div>
              <!-- /.enable-ideas-scrollable -->

            </div>
            <!-- /.card card-shadow -->
          </div>
          <!-- /.col-12 col-12 col-md-12 col-lg-12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.col-12 col-sm-12 col-md-12 col-lg-12 -->
    </div>
  </div> --}}


  <!-- /.row -->

@endsection

@section('customJS')
  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

  <script>
    Vue.config.devtools = true;

    const app = new Vue({
      el: '#app',
      data() {
        return {
          ideas: [],
          dateField: [],
          ideas_published: [],
          loading: true,
          ideasCount: 0
        };
      },

      methods: {
        getIdea() {

          axios.get('/secure/admin/all-ideas-published').then((response) => {
            this.ideas = response.data.ideas;
            this.loading = false;
            // console.log(response.data);
          }).catch((err) => {
            console.log(err.response);
          });
          // axios.get('/secure/dashboard/all-ideas').then((response) => {
          //   this.ideas_published = response.data.ideas;
          //   this.loading = false;
          //   // console.log(response.data);
          // }).catch((err) => {
          //   console.log(err.response);
          // });
        },
        like(ideaId) {
          axios.post(`/secure/dashboard/submit-like`, { idea_id: ideaId }).then((response) => {
            this.getIdea();

            console.log(response.data);
          }).catch((err) => {
            console.log(err);
          });
        },



        // Stert- Filter Functions
        CallDatePicker(){
            let myThis = this;
            var picker = new Lightpick({
            field: document.getElementById('demo-1'),
            singleDate: false,
            autoClose: true,
            selectForward: false,
            format: 'MM/DD/YYYY',
            // minDate: moment().startOf('month').add(7, 'day'),
            // maxDate: moment().endOf('month').subtract(7, 'day'),
            onSelect: function(start, end){
                date = document.getElementById('demo-1').value;
                this.dateField = date.split("-");
                console.log(this.dateField[1])
                if (this.dateField[1] != " ...") {
                    myThis.filterAllIdea(this.dateField);
                }
            }
            });
        },
        filterAllIdea(datePickerData=null){

            if(this.dateField != datePickerData){
                this.dateField = datePickerData;
            }

            // console.log("called", this.nameField);
            const data = {};

            if (this.dateField.length == 2 && this.topic != '' && this.nameField != '') {
                data.start = this.dateField[0];
                data.end = this.dateField[1];
                data.topic = this.topicField;
                data.uuid = this.nameField;
            }//3select
            else if (this.dateField.length == 2 && this.topic == '' && this.nameField != '') {
                data.start = this.dateField[0];
                data.end = this.dateField[1];
                data.topic = null;
                data.uuid = this.nameField;
            }//date&name
            else if (this.dateField.length == 2 && this.topic != '' && this.nameField == '') {
                data.start = this.dateField[0];
                data.end = this.dateField[1];
                data.topic = this.topicField;
                data.uuid = null;
            }//date&topic
            else if (this.dateField.length != 2 && this.topic != '' && this.nameField != '') {
                data.start = null;
                data.end = null;
                data.topic = this.topicField;
                data.uuid = this.nameField;
            }//topic&name
            else if (this.dateField.length == 2 && this.topic == '' && this.nameField == '') {
                data.start = this.dateField[0];
                data.end = this.dateField[1];
                data.topic = null;
                data.uuid = null;
            }//only date
            else if (this.dateField.length != 2 && this.topic != '' && this.nameField == '') {
                data.start = null;
                data.end = null;
                data.topic = this.topicField;
                data.uuid = null;
            }//only topic
            else {
                data.start = null;
                data.end = null;
                data.topic = null;
                data.uuid = this.nameField;
            }//only name

            // if (this.dateField.length == 2 && this.topic != '') {

            //     data.start = this.dateField[0];
            //     data.end = this.dateField[1];
            //     data.topic = this.topicField;

            // } else if (this.dateField.length == 2 && this.topic == '') {

            //     data.start = this.dateField[0];
            //     data.end = this.dateField[1];
            //     data.topic = null;

            // } else {
            //     data.start = null;
            //     data.end = null;
            //     data.topic = this.topicField;
            // }

            console.log(data);
            axios.post('/secure/dashboard/filter-all-ideas-published', {
                start: data.start,
                end: data.end,
                topic: data.topic,
                uuid: data.uuid
            }).then((response) => {
                this.ideas = response.data.ideas;
                this.filteredData = response.data.ideas;
                this.ideasCount = response.data.ideasCount;
                this.intervalFetchData();

                // console.log(data);
                // console.log(response.data);
            }).catch((err) => {
                console.log(err.response);
            });
        },
        // End-Filter Functions


        makeFeatured(ideaId) {
          // alert(ideaId);
          axios.post(`/secure/admin/make_featured`, { idea_id: ideaId }).then((response) => {
            // console.log(this.dateField);
            if(this.dateField == ""){
              this.getIdea();
            }else{
              this.filterAllIdea(this.dateField);
            }            // this.filteredData.push(response.data[1]);
            console.log(response.data[1]);
          }).catch((err) => {
            console.log(err);
          });
        },
        makeNonFeatur(ideaId) {
          // alert(ideaId);
          axios.post(`/secure/admin/make_non_featured`, { idea_id: ideaId }).then((response) => {
            if(this.dateField == ""){
              this.getIdea();
            }else{
              this.filterAllIdea(this.dateField);
            }

            console.log(response.data);
          }).catch((err) => {
            console.log(err);
          });
        },
        makePiloted(ideaId) {
          // alert(ideaId);
          axios.post(`/secure/admin/make_piloted`, { idea_id: ideaId }).then((response) => {
            // console.log(this.dateField);
            if(this.dateField == ""){
              this.getIdea();
            }else{
              this.filterAllIdea(this.dateField);
            }            // this.filteredData.push(response.data[1]);
            console.log(response.data[1]);
          }).catch((err) => {
            console.log(err);
          });
        },
        makeNonPiloted(ideaId) {
          // alert(ideaId);
          axios.post(`/secure/admin/make_non_piloted`, { idea_id: ideaId }).then((response) => {
            if(this.dateField == ""){
              this.getIdea();
            }else{
              this.filterAllIdea(this.dateField);
            }

            console.log(response.data);
          }).catch((err) => {
            console.log(err);
          });
        }
      
      },

  


      

      created() {
        this.getIdea();

        Echo.channel('idea').listen('NewComment', (e) => {
          this.comments.push({
            comment: e.comment
          });
        });
      }
    });

    Vue.filter('formatDate', function(value) {
      if (value) {
        return moment(String(value)).fromNow();
      }
    });

    const filter = function(text, length, clamp) {
      clamp = clamp || '...';
      var node = document.createElement('div');
      node.innerHTML = text;
      var content = node.textContent;
      return content.length > length ? content.slice(0, length) + clamp : content;
    };

    Vue.filter('truncate', filter);

    // window.__VUE_DEVTOOLS_GLOBAL_HOOK__.Vue = app.constructor;
  </script>
@endsection
