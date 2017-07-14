 <template>
  <div>
        <div>
              <video  id="video"  class="video-js ahmed vjs-big-play-centered" data-setup={}  controls>
                 <source src="videos/property.mp4 " type="video/mp4">
              </video>
         </div>
    </div>
</template>
<script>
export default{
mounted(){
  let video = videojs("video");
  
}
}
</script>
<style>
    .ahmed{
      height:300px;
      width:444px;
      margin-top:-15px;
    }
    .video-js .vjs-control-bar{
    background: #006680;
    }
</style>