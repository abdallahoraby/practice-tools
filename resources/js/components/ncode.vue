<template>
  <div class="card component-card_1">
    <div class="card-body" v-if="!semiFinal">
      <div class="floating">({{ picked }})</div>
      <h6 class="text-left text-ar">
        <span v-if="local == 'en'">
          Please choose {{ maxPicked == 294 ? ' at least ' + 24 : maxPicked }} beliefs from the codes below
        </span>
        <span v-else>
          برجاء أختيار  
          {{ maxPicked == 294 ? ' بحد ادني  ' + 24 : maxPicked }}
          {{maxPicked == 6 ? 'معتقدات' : 'معتقد'}}
          من الرموز أدناه
        </span>
      </h6>
      <div class="row">
        <div
          class="col-12"
          v-for="(item, catIndex) in selectedWords"
          :key="catIndex"
        >
          <h5 class="font-weight-bold text-center">
            {{ trans(item.category_title) }}
          </h5>
          <hr />
          <div class="row">
            <div
              class="col-md-6"
              v-for="(word, index) in item.category_data"
              :key="index"
            >
              <button
                :data-ref="[item.category_title.replace(/[^A-Za-z]/g, '')]"
                :class="[item.category_color, word.replace(/[^A-Za-z]/g, ''), isSelected(item.category_title, word) ? 'selected' : null]"
                class="w-100 btn mb-4 mr-2 btn-lg word"
                @click="select(item.category_title, word)"
              >
                {{ trans(word) ? trans(word).substr(word.indexOf('.') + 1) : ". . ." }}
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <div class="">
          <button
            v-if="currentPhase != 0"
            @click="prevPhase()"
            class="btn btn-info ml-2 btn-lg"
            id="previousBtn"
          >
            {{ trans("previous") }}
          </button>
        </div>
        <div class="d-flex">
          <button
            v-if="maxPicked == 6 && picked == 6"
            id="submit"
            @click="semiToolOver()"
            class="btn btn-info ml-2 btn-lg"
          >
            {{ trans("finish") }}
          </button>
          <button
            v-if="(picked >= 24 || picked == maxPicked) && maxPicked !=6"
            @click="nextPhase()"
            class="btn btn-info ml-2 btn-lg"
          >
            {{ trans("next") }}
          </button>
        </div>
      </div>
    </div>
    <div class="card-body text-center" v-else>
      <h5 class="info-heading">{{trans('Final Result')}}</h5>
      <hr>

      <button v-for="(word, i) in result" :key="i" 
        class=" btn w-50 mb-4 mr-2 btn-lg word"
        :class="word.split('*')[1]"
      >
          {{ trans(word.split('*')[0]).substr(word.indexOf('.') + 1) }}
      </button>
      <h5 class="info-heading mb-5 mt-2">{{trans('Are you sure of the entered data?')}}</h5>

      <div class="d-flex justify-content-center">
        <div class="">
          <button
            @click="prevPhase()"
            class="btn btn-info ml-2 btn-lg"
          >
            {{ trans("previous") }}
          </button>
  
          <button
            @click="retry()"
            class="btn btn-info ml-2 btn-lg"
            >
            {{ trans("Retry") }}
          </button>
          <button
            @click="toolOver()"
            class="btn btn-info ml-2 btn-lg"
            >
              {{ trans("finalSave") }}
            </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      lang: {},
      opned: [],
      selectedWords: [],
      result: [],
      filtered: [],
      filterArchive: [],
      picked: 0,
      pickeArchive: [],
      picked_0: 0,
      maxPicked: 294,
      phase: [],
      currentPhase: 0,
      semiFinal: 0,
    };
  },
  props: ["langApi", "ncodeApi", "saveApi", "token", "local", "opnedApi"],
  methods: {
    retry(){
      location.reload()
    },
    isSelected(cat_title, word) {

      // Ensure that filtred not empty
      if (this.filtered.length == 0) return false

      // Ensure that category is exist
      let fCatindex = this.filtered.findIndex(
        (e) => e.category_title == cat_title
      );

      if (fCatindex == -1) return false

      // Ensure that word is exist 
      let fWordindex = this.filtered[fCatindex].category_data.indexOf(word);

      if (fWordindex == -1) return false

      return true
    },
    semiToolOver() {

      this.phase[this.currentPhase] = this.selectedWords;
      this.currentPhase = this.currentPhase + 1;

      this.filtered = this.filtered.filter((e) => e.category_data.length != 0)

      this.selectedWords = this.filtered

      this.result = []

      this.filtered.map((row) => {
        row.category_data.map((word) => {
            this.result.push(`${word}*${row.category_color}`);
          });
      });

      this.maxPicked = 3
      this.semiFinal = 1
    },
    async toolOver() {

      let resSwal = await swal({
          title: this.trans("Are you sure of the entered data?"),
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: this.trans("Ok"),
          cancelButtonText: this.trans("Cancel"),
          padding: '2em'
      })

      if (resSwal.value)
        return axios
          .post(this.saveApi, {
            result: this.result,
            token: this.token,
            local: this.local,
          })
          .then((res) => window.location.assign(res.data.payload));
    },
    prevPhase() {
       if (this.semiFinal == 0) {
        this.filterArchive[this.currentPhase] = this.filtered;
        this.pickeArchive[this.currentPhase] = this.picked;
      }

      this.semiFinal = 0

      this.filtered = this.selectedWords;

      this.currentPhase = this.currentPhase - 1;
      this.selectedWords = this.phase[this.currentPhase];
      this.maxPicked = this.maxPicked == 24 ? 294 : this.maxPicked * 2;

      this.picked = (this.maxPicked == 294) 
                ? this.picked_0 
                : this.maxPicked
    },
    nextPhase() {
      
      if (this.picked >= 24 || this.picked == this.maxPicked) {
        if (this.currentPhase == 0) this.picked_0 = this.picked
        this.phase[this.currentPhase] = this.selectedWords;
        this.currentPhase = this.currentPhase + 1;

        this.filtered = this.filtered.filter((e) => e.category_data.length != 0)
        this.selectedWords = this.filtered;

        if (this.filterArchive[this.currentPhase] != null) {

          // Delete categories that not exist in selected words 
            // Decrease picked in delation

          this.filterArchive[this.currentPhase] = this.filterArchive[this.currentPhase].filter((e) => {
            let catindex = this.selectedWords.findIndex((r) => r.category_title == e.category_title);

            if (catindex == -1) 
              this.pickeArchive[this.currentPhase] -= e.category_data.length
        
            return !(catindex == -1)
          });

          // foreach category in archive , ensure that elms in cat_data are be in selected words
          this.filterArchive[this.currentPhase].map((e) => {
            let catindex = this.selectedWords.findIndex((r) => r.category_title == e.category_title);

            this.filterArchive[this.currentPhase][catindex].category_data = e.category_data.filter((word) => {
              let index = this.selectedWords[catindex].category_data.indexOf(word)
              if (index == -1)
                this.pickeArchive[this.currentPhase]--

              return !(index == -1)
            })
          });

        }
        
        this.filtered = this.filterArchive[this.currentPhase] == null ? [] : this.filterArchive[this.currentPhase];
        this.picked = this.filterArchive[this.currentPhase] == null ? 0 : this.pickeArchive[this.currentPhase];

        this.maxPicked = this.maxPicked == 294 ? 24 : this.maxPicked / 2;
          
        window.scrollTo(0, 0);
        // $(".word").removeClass("selected");
    }
    },
    trans(prop) {
      return this.lang[prop];
    },
    select(cat_title, word) {
      let fCatindex = this.filtered.findIndex(
        (e) => e.category_title == cat_title
      );
      
      if (fCatindex == -1) {
        // Category dosen't exist
        // push if adding is open
        if (this.picked == this.maxPicked)
          return swalFire(this.trans("You have exceeded the selection limit"));

        // Get Category info by category title
        let catIndex = this.selectedWords.findIndex(
          (e) => e.category_title == cat_title
        );
        
        this.filtered.push({
          category_title: this.selectedWords[catIndex].category_title,
          category_color: this.selectedWords[catIndex].category_color,
          category_data: [word],
        });
        this.picked++;
      } else {
        // Category is exist ✔
        // Search for word
        let index = this.filtered[fCatindex].category_data.indexOf(word);
        if (index == -1) {
          // Word dosen't exist
          // push if adding is open
          if (this.picked == this.maxPicked)
            return swalFire(this.trans("You have exceeded the selection limit"));

          this.filtered[fCatindex].category_data.push(word);
          this.picked++;
        } else {
          // Word is exist so delete it
          this.filtered[fCatindex].category_data.splice(index, 1);
          if (this.filtered[fCatindex].category_data == [])
            this.filtered.splice(fCatindex, 1);

          this.picked--;
        }
      }
      $(`[data-ref="${cat_title.replace(/[^A-Za-z]/g, '')}"].${word.replace(/[^A-Za-z]/g, '')}`).toggleClass("selected");
    },
  },
  async mounted() {
    let opned_res = await axios.get(this.opnedApi);
    this.opned = opned_res.data.payload

    let res = await axios.get(this.ncodeApi);

    this.opned.map((item, index) => {
      if (item) this.selectedWords.push(res.data.payload[index]);
    });

    let lang_res = await axios.get(this.langApi);

    this.lang = lang_res.data.payload
  },
  created() {},
};
</script>