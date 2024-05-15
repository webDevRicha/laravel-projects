@extends('layouts.main')
    @section('content')
      <!-- ======= Hero Section ======= -->
      <section id="hero">
         <div class="hero-container" data-aos="fade-in">
            <h1>Welcome to toDoList</h1>
            <h2>To do list design using HTML, CSS, Bootstrap, JavaScript</h2>
            <img src="{{ asset('images/hero-img.png') }}" alt="Hero Imgs" data-aos="zoom-out" data-aos-delay="100">
            <a href="#to-do-list" class="btn-get-started scrollto">Get Started</a>
         </div>
      </section>
      <!-- End Hero Section -->
      
      <main id="main">

         <!-- ======= Get Started Section ======= -->
         <section id="to-do-list" class="padd-section text-center">

         <div class="container" data-aos="fade-up">
            <div class="section-title text-center">

               <h2>simple to do list </h2>
               <!-- <p class="separator">Integer cursus bibendum augue ac cursus .</p> -->

            </div>
         </div>

         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-8">
                     <div class="card">
                        <div class="card-body">
                           <form id="todo-form">
                                 <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                          id="todo-input"
                                          placeholder="Add new task"
                                       required>
                                    <button class="btn btn-primary" type="submit">
                                          Add
                                       </button>
                                 </div>
                           </form>
                           <ul class="list-group" id="todo-list">
                                 <!-- Tasks will be added here dynamically -->
                           </ul>
                        </div>
                     </div>
               </div>
            </div>
         </div>

         </section><!-- End Get Started Section -->

      </main><!-- End #main -->
    @stop