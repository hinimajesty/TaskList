
.column - board__list
.column__addtasklist - board__content 
.add-card-btn - board_btn 
display:flex;flex-direction:column - .board__form  
background-color: grey;cursor:pointer;font-size:13px = board_btn board_btn--addtask 
display:flex; align-items:center;column-gap:20px; = board__controls 
btn - board__btn 
board__btn = font-size:20px;font-family:sans-serif; cursor:pointer;

column (TaskList) - board__list board__list--addtask
column__heading - board__heading
close-btn - board_btn board_btn--close
cards = board__card
add-card-btn = board_btn board_btn--addcard
create-card-form = board__form board__form-createcard 
text_area = board__textarea 
card-btns = board_control board__control--card-btns ("gap:20px;)
btn = board__btn board__btn-addcard( style="background-color: grey; font-size:13px;")
style="font-family: sans-serif;width:10px; height:10px;cursor:pointer;" == board__btn board__btn--closecard
